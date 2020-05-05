<template>
  <v-container fluid class="pt-0">
    <v-row no-gutters class="wrap-breadcrumbs">
      <span class="title">ファイル管理</span>
      <v-spacer></v-spacer>
      <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
    </v-row>

    <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile>
      <v-card-actions class="pa-4">
        <v-subheader>一覧</v-subheader>
        <v-spacer></v-spacer>
        <v-btn class="primary" @click="openFileUpload()">アップロード</v-btn>
        <v-btn color="error" @click="deleteFile()">削除</v-btn>
      </v-card-actions>
      <v-divider></v-divider>
      <v-card-text>
        <v-data-table
          :headers="headers"
          :items="fileLists"
          :loading="loading"
          :loading-text="loadingText"
          :no-data-text="noDataText"
          :options.sync="options"
          :show-select="true"
          :hide-default-footer="false"
          :footer-props="footerProps"
          :server-items-length="totalRecords"
          v-model="selected"
          item-key="id"
          class="elevation-1"
        >
          <template
            v-slot:item.created_at="{item}"
          >{{ item.created_at | moment("YYYY/MM/DD HH:mm") }}</template>

          <template v-slot:item.image_name="{item}">
            <a href="javascript:void(0)" v-bind:class="{ disable_delete: item.is_delete_ban }" @click="downloadFile(item)">{{item.image_name}}</a>
          </template>

          <template v-slot:top>
            <common-delete-modal
              :dialog="dialogDelete"
              :url="deleteUrl"
              @closeModal="closeDeleteModal"
              @reloadList="getDataFromApi"
            ></common-delete-modal>
            <upload-file-modal
              :uploadFileModal="uploadModal"
              :typeFile="'other'"
              @closeFileUpload="closeFileUpload"
              @reloadList="getDataFromApi"
            ></upload-file-modal>
          </template>

          <template v-slot:footer.page-text="pageText">
            <span
              v-if="pageText.itemsLength"
            >{{ pageText.pageStart }} ~ {{ pageText.pageStop }} / {{ pageText.itemsLength }}</span>
          </template>

          <!-- Slot No data -->
          <template v-slot:no-data>
            <div color="primary">一致するデータが見つかりません</div>
          </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </v-container>
</template>

<script>
import $ from 'jquery'
import Util from "@/util"
import Constant from "@/config/constants"
import CommonDeleteModal from "@/components/modals/common/delete"
import UploadFileModal from "@/components/modals/file/upload"

export default {
  name: "file",
  components: { CommonDeleteModal, UploadFileModal },
  data() {
    return {
      keyLocalStore: "filter-file",
      valid: true,
      dialogDelete: false,
      uploadModal: false,
      restore_list_data: false,
      headers: [
        { text: "アップロード日", value: "created_at", sortable: true },
        { text: "ファイル名", value: "image_name", sortable: true }
      ],
      loading: false,
      selected: [],
      fileLists: [],
      totalRecords: 0,
      options: { itemsPerPage: Constant.ROW_PER_PAGE },
      footerProps: {
        "items-per-page-options": Constant.ITEM_PER_PAGE_OPTIONS,
        "items-per-page-text": "ページごとの行："
      },
      deleteUrl: "",
      pageText: {
        pageStart: 0,
        pageStop: 0,
        itemsLength: 0
      },
      breadcrumbs: [
        {
          text: "Home",
          disabled: false,
          href: "/"
        },
        {
          text: "車両一覧",
          href: "/trade"
        },
        {
          text: "車両詳細",
          href: "/trade/" + this.$route.params.id + "/detail"
        },
        {
          text: "ファイル管理"
        }
      ]
    }
  },
  watch: {
    options: {
      handler() {
        this.setFiltersToStore()
        this.getDataFromApi()
      }
    }
  },
  methods: {
    setFiltersToStore() {
      if (location.hash == "#restore-list-data") {
        location.hash = ""
        this.options = this.getFiltersFromStore("options")
        this.restore_list_data = true
      } else {
        localStorage.setItem(
          this.keyLocalStore + "-options",
          JSON.stringify(this.options)
        )
      }
    },
    getFiltersFromStore() {
      return JSON.parse(
        localStorage.getItem(this.keyLocalStore + "-options") || "[]"
      )
    },
    getDataFromApi() {
      let queryString = Util.serializeObj(this.getFiltersFromStore())
      try {
        this.loading = true

        this.$axios
          .get("trade/" + this.$route.params.id + "/file?" + queryString)
          .then(res => {
            this.totalRecords = res.data.data.file_lists.total
            this.fileLists = res.data.data.file_lists.data.filter(file => file.type == 'other')
            this.loading = false

            $('.disable_delete').parent().parent().find('.v-simple-checkbox').remove();

          })
      } catch (e) {
        console.log(e.message)
      }
    },
    closeDeleteModal() {
      this.dialogDelete = false
    },
    openFileUpload() {
        this.uploadModal = true
    },
    closeFileUpload() {
        this.uploadModal = false
    },
    downloadFile(item) {
      let fileName = item.image_path.split("\\").splice(-1,1)
      let name = item.image_name
      const key = btoa(btoa(this.user.email))
      const userData = this.user.email
      window.open(
        process.env.SERVER_URL +
          `/file/download/${item.id}/${userData}/${key}`,
        "_blank"
      )
    },
    deleteFile() {
      let ids = []
      if (this.selected) {
        for (var i = 0; i < this.selected.length; i++) {
          ids.push(this.selected[i].id)
        }
      }
      this.deleteUrl = "file/delete?ids=" + ids.toString()
      this.dialogDelete = true
    }
  },
  computed: {
    loadingText() {
      return this.$t("common.paging_loading")
    },
    noDataText() {
      return this.$t("common.paging_no_data")
    }
  },
  mounted() {
    this.getDataFromApi()
  }
}
</script>