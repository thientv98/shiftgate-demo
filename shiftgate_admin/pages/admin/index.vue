<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">コンシェルジュ管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
        
        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile="">
               
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn class="primary" :to="{ path: '/admin/create'}">新規登録</v-btn>
                <v-btn color="error" @click="deleteUsers">削除</v-btn>
            </v-card-actions>

            <v-divider></v-divider>

            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="users"
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
                    <template v-slot:item.last_name="{item}">
                        <a :href="'/admin/' + item.id + initParams">{{ item.last_name }}{{ item.first_name }}</a>
                    </template>

                    <template v-slot:top>
                        <common-delete-modal 
                            :dialog="dialogDelete"
                            :url="deleteUrl"
                            @closeModal="closeModal"
                            @reloadList="init"
                            ></common-delete-modal>
                    </template>

                    <template v-slot:footer.page-text="pageText">
                        <span v-if="pageText.itemsLength">
                            {{ pageText.pageStart }} ~ {{ pageText.pageStop }} / {{ pageText.itemsLength }}
                        </span>
                    </template>

                </v-data-table> 
            </v-card-text>
            
        </v-card>
    </v-container>        
</template>

<script>
import Util from '@/util';
import Constant from '@/config/constants';
import CommonDeleteModal from '@/components/modals/common/delete'

export default {
    name: 'app-admin',
    components: {
        CommonDeleteModal,
    },
    data: () => ({
        valid: true,
        dialogDelete: false,
        headers: [
                    { text: '氏名', value: 'last_name', sortable: true },
                    { text: 'メールアドレス', value: 'email', sortable: true, width: '60%' },
                ],
        users: [],
        loading: false,
        selected: [],
        error: '',
        totalRecords: 0,
        options: { itemsPerPage: Constant.ROW_PER_PAGE },
        footerProps: {
            'items-per-page-options': Constant.ITEM_PER_PAGE_OPTIONS,
            'items-per-page-text': "ページごとの行："
        },
        deleteUrl: '',
        pageText: {
            pageStart: 0,
            pageStop: 0,
            itemsLength: 0
        },
        breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: 'コンシェルジュ管理',
                    href: '',
                }
            ]
    }),
    
    watch: {
        options: {
            handler () {
                this.init()
            }
        },
    },

    computed: {
        loadingText () {
            return this.$t('common.paging_loading')
        }, 
        noDataText () {
            return this.$t('common.paging_no_data')
        },
        initParams () {
            return '?' + Util.serializeObj(this.options)
        },        
        mappingParams() {            
            if (this.$route.query.sortBy) {
                this.options.sortBy = [this.$route.query.sortBy]
            }
            if (this.$route.query.sortDesc) {
                this.options.sortDesc = [this.$route.query.sortDesc]
            }
            if (this.$route.query.groupBy) {
                this.options.groupBy = [this.$route.query.groupBy]
            }
            if (this.$route.query.groupDesc) {
                this.options.groupDesc = [this.$route.query.groupDesc]
            }
            if (this.$route.query.itemsPerPage) {
                this.options.itemsPerPage = this.$route.query.itemsPerPage
            }
            this.options.page = this.$route.query.page ? parseInt(this.$route.query.page) : 1
        },
        reloadData() {
            this.users = []
            this.selected = []
            let result = this.$store.state.user.userList
            if(result) {
                this.users = result.data
                this.totalRecords = result.total
            }
        },
    },

    created () {
    },

    mounted() {
        this.mappingParams
        this.init()
    },
    
    methods: {        
        async init () {
            this.loading = true
            try {
                await this.$store.dispatch('user/userList', this.options)
                this.reloadData
            } catch (e) {
                this.error = e.message
            } 
            this.loading = false
        },

        deleteUsers (item) {
            let ids = []
            if(this.selected){
                for(var i = 0; i < this.selected.length; i++) {
                    ids.push(this.selected[i].id)
                }
            }
            this.deleteUrl = 'user/delete?ids=' + ids.toString()
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