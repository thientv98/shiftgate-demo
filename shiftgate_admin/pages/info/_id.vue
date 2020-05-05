<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">お知らせ管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
                
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-card class="mt-5 form-data wrapper-content" flat tile="">

                <v-card-actions class="pa-4">
                    <v-subheader class="font-weight-bold">編集</v-subheader>
                </v-card-actions>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <p class="mb-0">
                                    <span>お知らせ日付</span> 
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-menu
                                    v-model="popupPicker"
                                    :close-on-content-click="false"
                                    :nudge-right="40"
                                    transition="scale-transition"
                                    offset-y
                                    min-width="290px"
                                >
                                    <template v-slot:activator="{ on }">
                                        <v-text-field outlined dense
                                            clearable
                                            @click:clear="published_date=null"
                                            v-model="published_date"
                                            readonly v-on="on"
                                            class="border-important"
                                            :error-messages="errors.published_date ? errors.published_date[0] : ''"
                                        ></v-text-field>
                                    </template>
                                    <v-date-picker v-model="published_date"
                                        :first-day-of-week="0" locale="ja-jp" 
                                        :reactive="reactive"
                                        @change="getDate" 
                                        @input="popupPicker=false" no-title></v-date-picker>
                                </v-menu>
                            </v-col>
                        </v-row>

                        <v-row class="item-row pt-6">
                            <v-col class="pb-0 row-padding" cols="12" md="12">
                                <p class="mb-0">
                                    <span>内容</span> 
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-textarea outlined dense
                                    ref="content"
                                    v-model="content"
                                    data-vv-name="content"
                                    required
                                    :error-messages="errors.content ? errors.content[0] : ''"
                                ></v-textarea>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="12">
                                <p class="mb-0">
                                    <span>リンクURL</span> 
                                </p>
                                <v-text-field outlined dense
                                    ref="link_url"
                                    v-model="link_url"
                                    data-vv-name="link_url"
                                    required
                                    :error-messages="errors.link_url ? errors.link_url[0] : ''"
                                ></v-text-field>
                            </v-col>
                        </v-row>

                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn @click="back">戻る</v-btn>
                    <v-btn color="error" @click="deleteUser">削除</v-btn>
                    <v-btn color="primary" @click="submit">保存</v-btn>
                </v-card-actions>

            </v-card> 
        </v-form>

        <common-delete-modal 
            :dialog="dialogDelete"
            :url="deleteUrl"
            @closeModal="closeModal"
            @reloadList="back"
            ></common-delete-modal>
            
    </v-container>
</template>

<script>
import CommonDeleteModal from '@/components/modals/common/delete'

export default {
    name: 'app-info-update',
    components: {
        CommonDeleteModal,
    },
    data() {
        return {
            dialogDelete: false,
            deleteUrl: '',
            valid: true,
            error: '',
            reactive: true,
            selectDate: null,
            popupPicker: false,
            id: null,
            published_date: null,
            content: null,
            link_url: null,
            query: null,
            role: '',
            breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: 'お知らせ管理',
                    href: '/info',
                },
                {
                    text: '編集',
                    href: '',
                }
            ],
        };
    },

    mounted() {
        if(this.$route.params.id) this.id = this.$route.params.id
        this.query = this.$route.query
        this.init()
    },

    methods: {
        getDate() {            
            this.selectDate = this.published_date
        },

        submit () {            
            if(this.$refs.form.validate()) {
                this.save()
            }
        },
        
        init () {
            try {
                let url = `info/${this.id}`;
                this.$axios.get(url)
                    .then((res) => {
                        if (res.status === 200) { 
                            let result = res.data.data
                            if(result.notice) {
                                this.id = result.notice.id
                                this.published_date = result.notice.published_date
                                this.link_url = result.notice.link_url
                                this.content = result.notice.content
                            }
                        }
                    })
            } catch (e) {
                this.error = e.message
            } 
        }, 

        save () {
            try {
                let url = `info/save`;
                let params = {
                    id: this.id,
                    published_date: this.published_date,
                    link_url: this.link_url,
                    content: this.content
                }
                this.$axios.post(url, params)
                    .then((res) => {
                        if (res.status === 200) { 
                            this.$notify({
                                type: 'success',
                                title: this.$t('common.success')
                            });
                            this.$router.push({path: '/info?', query: this.query})
                        }
                    })
            } catch (e) {
                this.error = e.message
            }
        },
        
        back () {
            this.$router.push({path: '/info?', query: this.query})
        }, 

        deleteUser() {
            let ids = [0]
            this.deleteUrl = 'info/delete?ids=' + this.id
            this.dialogDelete = true
        }, 

        closeModal() {
            this.dialogDelete = false
        },
    },
} 
</script>

<style scoped>

</style>