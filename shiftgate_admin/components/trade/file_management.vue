<template>
    <v-card-text>
        <v-card-title class="pt-0 pb-0">取引状況</v-card-title>
        <v-container>
            <div class="text-right">
                <a href="javascript:void(0)" class="space-link" @click="openFileUpload('estimate','.pdf')">アップロード</a>
            </div>
            <v-data-table 
              dense :headers="headersEstimate" 
              :items="estimate" 
              :hide-default-footer="true" 
              class="elevation-1x custom-table" 
              id="table-file-estimate"
              :no-data-text="noDataText"
              v-model="selected">

              <template v-slot:body="{ items }">
                  <tbody>
                      <tr v-for="item in items" :key="item.id">
                          <td> <v-checkbox v-model="item.is_use_estimate" @change="changeEstimate(item.id)"></v-checkbox></td>
                          <td>{{ item.created_at }}</td>
                          <td><a href="javascript:void(0)" class="space-link" @click="downloadFile(item)">{{ item.image_name }}</a></td>
                      </tr>
                  </tbody>
              </template>
            </v-data-table>
        </v-container>
        <v-card-title class="pt-0 pb-0">契約書</v-card-title>
        <v-container>
            <v-simple-table dense class="custom-table">
                <template v-slot:default>
                    <thead>
                        <th></th>
                        <th>ステータス</th>
                        <th>承認日付</th>
                        <th class="py-0" colspan="2">ファイル名</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>売り主</td>
                            <td>{{ contactSeller.is_signature_contract == 1 ? '署名済み' : contactSeller.is_signature_contract == 0 ? '未署名' : '' }}</td>
                            <td>{{ contactSeller.signature_date | moment("YYYY/MM/DD HH:mm") }}</td>
                            <td><a href="javascript:void(0)" class="space-link" @click="downloadFile(contactSeller)">{{ contactSeller.image_name }}</a></td>
                            <td><a href="javascript:void(0)" @click="openFileUpload('contract_seller', '.pdf', contactSeller.id)">アップロード</a></td>
                        </tr>
                        <tr>
                            <td>買い主</td>
                            <td>{{ contactBuyer.is_signature_contract == 1 ? '署名済み' : contactBuyer.is_signature_contract == 0 ? '未署名' : '' }}</td>
                            <td>{{ contactBuyer.signature_date | moment("YYYY/MM/DD HH:mm") }}</td>
                            <td><a href="javascript:void(0)" class="space-link" @click="downloadFile(contactBuyer)">{{ contactBuyer.image_name }}</a></td>
                            <td><a href="javascript:void(0)" @click="openFileUpload('contract_buyer', '.pdf', contactBuyer.id)">アップロード</a></td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-container>
        <upload-file-modal
          :uploadFileModal="uploadModal"
          :typeFile="typeFile"
          :idFile="idFile"
          :acceptPdf="acceptPdf"
          @closeFileUpload="closeFileUpload"
          @reloadList="reloadPage"
        ></upload-file-modal>
        
        <v-overlay :value="loading">
          <v-progress-circular
            :size="50"
            color="white"
            indeterminate
          ></v-progress-circular>
        </v-overlay>
    </v-card-text>
</template>

<script>
import $ from 'jquery'
import UploadFileModal from "@/components/modals/file/upload"

export default {
  name: "file-management",
  props: ["tradeFileList"],
  components: { UploadFileModal },

  data() {
    return {
      headersEstimate: [
        {
          text: '確定',
          align: 'center',
          sortable: false,
          value: 'checkbox',
        },
        {
          text: 'アップロード日付',
          align: 'start',
          sortable: false,
          value: 'updated_at',
        },
        {
          text: 'ファイル名',
          align: 'start',
          sortable: false,
          value: 'image_name',
        },
      ],
      selected: [],
      uploadModal: false,
      typeFile: 'other',
      idFile: null,
      acceptPdf: null,
      loading: false,
    }
  },
  methods: {
    downloadFile(item) {
      let fileName = item.image_path.split("\\").splice(-1,1)
      let name = item.image_name
      const key = btoa(btoa(this.user.email))
      const userData = this.user.email
      window.open(process.env.SERVER_URL +`/file/download/${item.id}/${userData}/${key}`, "_blank")
    },
    closeFileUpload() {
      this.uploadModal = false
    },
    reloadPage() {
      this.$emit("reloadList")
    },
    openFileUpload(type, accept = null, id = null) {
      this.typeFile = type;
      this.uploadModal = true;
      this.idFile = id;
      this.acceptPdf = accept;
      console.log(accept)
    },
    changeEstimate(id) {
      try {
        this.loading = true
        this.$axios.get("file/update-estimate/" + id).then(res => {
          this.loading = false
          this.$notify({
            type: "success",
            title: res.data.message
          })
          this.$emit("reloadList")
        })
      } catch (e) {
        console.log(e.message)
      }
    }
  },

  computed: {
    noDataText() {
      return this.$t("common.paging_no_data")
    },
    fileList() {
      return this.tradeFileList.length ? this.tradeFileList : []
    },
    noDataEstimate() {
      let estimate = true;
      this.fileList.forEach(element => {
        if(element.type == "estimate")
          estimate = false;
      });
      return estimate;
    },
    contactSeller() {
      let seller = {}
      this.fileList.forEach(element => {
        if(element.type == "contract_seller") {
          seller = element
        }
      });
      if(Object.keys(seller).length === 0 && seller.constructor === Object) {
        seller = {
          id: null,
          is_signature_contract: null,
          updated_at: null,
          image_name: null
        }
      }
      return seller;
    },
    contactBuyer() {
      let buyer = {}
      this.fileList.forEach(element => {
        if(element.type == "contract_buyer") {
          buyer = element
        }
      });
      if(Object.keys(buyer).length === 0 && buyer.constructor === Object) {
        buyer = {
          id: null,
          is_signature_contract: null,
          updated_at: null,
          image_name: null
        }
      }
      return buyer;
    },
    estimate() {
      let estimate = []
      this.fileList.forEach(element => {
        if(element.type == "estimate") {
          estimate.push(element)
        }
      });
      console.log('new',estimate)
      return estimate;
    }
  },
}
</script>