<template>
    <v-card-text>
        <v-container>
            <v-simple-table dense class="custom-table">
                <template v-slot:default>
                    <thead>
                        <th>種類</th>
                        <th>ファイル</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>車検証</td>
                            <td><a v-if="inspection_image" download="inspection_image.jpg" class="space-link" :href="inspection_image">inspection_image.jpg</a></td>
                        </tr>
                        <tr>
                            <td>展開図</td>
                            <td><a v-if="development_image" download="development_image.jpg" class="space-link" :href="development_image">development_image.jpg</a></td>
                        </tr>
                        <tr>
                            <td>自賠責</td>
                            <td><a v-if="liability_insurance_image" download="liability_insurance_image.jpg" class="space-link" :href="liability_insurance_image">liability_insurance_image.jpg</a></td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-container>
    </v-card-text>
</template>

<script>
export default {
  name: "file-other",
  props: ["tradeDetail"],
  data() {
    return {
      fileListUrl: "/trade/" + this.$route.params.id + "/file"
    }
  },
  methods: {
    downloadFile(item) {
      let fileName = item.image_path.split("\\").splice(-1,1)
      let name = item.image_name
      const key = btoa(btoa(this.user.email))
      const userData = this.user.email
      window.open(process.env.SERVER_URL +`/file/download/${item.id}/${userData}/${key}`, "_blank")
    }
  },
  computed: {
    noDataText() {
      return this.$t("common.paging_no_data")
    },
    inspection_image() {
      return this.tradeDetail.inspection_image ? this.tradeDetail.inspection_image : null
    },
    development_image() {
      return this.tradeDetail.development_image ? this.tradeDetail.development_image : null
    },
    liability_insurance_image() {
      return this.tradeDetail.liability_insurance_image ? this.tradeDetail.liability_insurance_image : null
    }
  },
}
</script>

<style lang="scss" scoped>
.file-management {
  .title-custom {
    background: #ECEFF1 !important;
    color: black;
    font-size: 13px;
  }
  .left-col-border {
    border: 1px solid #ECEFF1;
  }
  .right-col-border {
    border-top: 1px solid #ECEFF1;
    border-bottom: 1px solid #ECEFF1;
    border-right: 1px solid #ECEFF1;
  }
  .next-left-col-border {
    border-left: 1px solid #ECEFF1;
    border-bottom: 1px solid #ECEFF1;
    border-right: 1px solid #ECEFF1;
  }
  .next-right-col-border {
    border-bottom: 1px solid #ECEFF1;
    border-right: 1px solid #ECEFF1;
  }
}
</style>