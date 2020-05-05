<template>
  <v-dialog :value="uploadFileModal" @input="closeUploadModal" max-width="500px">
    <v-card class="wrapper-content">
      <v-card-title>
        <span class="headline" v-html="'ファイルをアップロードする'"></span>
      </v-card-title>
      <v-divider></v-divider>
      <v-card-text>
        <v-container>
          <v-row>
            <v-file-input
              v-model="file"
              label="ファイル"
              :accept="acceptPdf"
              :error-messages="error.file ? error.file[0] : ''"
              :class="{ 'is-invalid': errors.file }"
              :rules="[rules.required, rules.sizeLessThan16_MB]"
            ></v-file-input>
          </v-row>
        </v-container>
      </v-card-text>
      <v-divider></v-divider>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary darken-1" tile small @click="submit()">保存</v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: "upload-file-modal",
  props: {
    uploadFileModal: {
      type: Boolean,
      default: false,
      required: true
    },
    typeFile: {
      type: String,
      required: false,
    },
    idFile: {
      type: Number,
      default: null,
      required: false,
    },
    acceptPdf: {
      type: String,
      default: null,
      required: false,
    }
  },
  data() {
    return {
      formData: {},
      file: null,
      rules: {
          required: (v) => !!v || 'フィールドは必須項目です',
          sizeLessThan16_MB: (v) => !!v && v.size < 16777215 || '画像サイズは16 MB未満である必要があります！'
      },
      error: ''
    }
  },
  computed: {},
  methods: {
    closeUploadModal() {
      this.$emit("closeFileUpload")
    },
    submit() {
      this.formData = new FormData()
      this.formData.append("file", this.file)
      this.formData.append("car_id", this.$route.params.id)
      this.formData.append("type", this.typeFile)
      this.formData.append("file_id", this.idFile)
      console.log(this.acceptPdf)
      this.$axios
        .post("file/upload", this.formData, {
          headers: { "Content-Type": "multipart/form-data" }
        })
        .then(res => {
          this.file = null
          this.$notify({
            type: "success",
            title: res.data.message
          })
          this.$emit("closeFileUpload")
          this.$emit("reloadList")
        })
        .catch(err => {
          this.error = err.response.data.message
        })
    }
  }
}
</script>