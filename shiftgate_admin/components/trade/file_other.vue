<template>
    <v-card-text>
        <v-container>
            <v-simple-table dense class="custom-table">
                <template v-slot:default>
                    <thead>
                        <th class="py-0" colspan="2">ファイル管理</th>
                    </thead>
                    <tbody>
                        <tr v-for="file in otherList" :key="file.id">
                            <td>{{ file.updated_at | moment("YYYY/MM/DD HH:mm") }}</td>
                            <td><a href="javascript:void(0)" class="space-link" @click="downloadFile(file)">{{file.image_name}}</a></td>
                        </tr>
                        <tr v-if="noDataOther" class="v-data-table__empty-wrapper"><td colspan="3" class="text-center">{{ noDataText }}</td></tr>
                    </tbody>
                </template>
            </v-simple-table>
            <div class="view-more">
                <a :href="fileListUrl" target="_blank">もっと見る</a>
            </div>
        </v-container>
    </v-card-text>
</template>

<script>
export default {
  name: "file-other",
  props: ["tradeFileList"],
  data() {
    return {
      fileListUrl: "/trade/" + this.$route.params.id + "/file",
      noDataOther: true
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
    fileList() {
      return this.tradeFileList.length ? this.tradeFileList : []
    },
    otherList() {
      let other = []
      this.fileList.forEach(element => {
        if(element.type == "other") {
          other.push(element)
          this.noDataOther = false;
        }
      });
      return other.length > 5 ? other.splice(0,5) : other;
    },
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