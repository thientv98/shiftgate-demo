<template>
    <v-dialog :value="dialogUploadImage" @input="closeModalUploadImage" max-width="500px">
        <v-card class="wrapper-content">
            <v-card-title>
                <span class="headline" v-html="'ファイルをアップロードする'"></span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container>
                    <v-form ref="image">
                        <v-row>
                            <v-file-input 
                                label="ファイル" 
                                v-model="image"
                                accept="image/png, image/jpeg, image/bmp"
                                :error-messages="error ? error : ''"
                                :rules="[rules.required, rules.sizeLessThan16_MB]"
                                required
                            ></v-file-input>
                        </v-row>
                    </v-form>
                </v-container>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary darken-1" small @click="uploadImage" tile>保存</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: 'trade-upload-image-modal',
    props: {
        dialogUploadImage: {
            type: Boolean,
            required: true,
        },
        itemSelected: {
            type: String,
            required: true,
        },
    },
    data: () => ({
        image: null,
        formData: {},
        rules: {
            required: (v) => !!v || 'フィールドは必須項目です',
            sizeLessThan16_MB: (v) => !!v && v.size < 16777215 || '画像サイズは16 MB未満である必要があります！'
        },
        error: ''
    }),
    computed: {
    },
    methods: {
        closeModalUploadImage () {
            this.$emit('closeModalUploadImage');
        },
        async uploadImage() {
            if (this.$refs.image.validate()) {
                try {
                    this.formData = new FormData()
                    this.formData.append(this.itemSelected, this.image)
                    this.formData.append("_method", "PUT")
                    await this.$axios.post('trade/'+ this.$route.params.id , this.formData, {headers: {'Content-Type': 'multipart/form-data'}}).then((res) => {
                        if (res.status === 200) { 
                            this.$notify({
                                duration: 5000,
                                type: 'success',
                                title: this.$t('common.success'),
                                // text: ''
                            });
                        }
                    })
                    this.image = null
                    this.$refs.image.reset()
                    this.$emit('reloadList');
                    this.$emit('closeModalUploadImage');
                } catch (e) {
                    // console.log(e.response)
                    this.error = e.response.data.message
                }
            }
        },
    },

}
</script>