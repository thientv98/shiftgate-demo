<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">お知らせ管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
        
        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile="">
               
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn class="primary" :to="{ path: '/info/create'}">新規登録</v-btn>
                <v-btn color="error" @click="deleteInfos">削除</v-btn>
            </v-card-actions>

            <v-divider></v-divider>

            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="infos"
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
                    <template v-slot:item.published_date="{item}">
                        {{ item.published_date_ymd }}
                    </template>
                    <template v-slot:item.content="{item}">
                        <a :href="'/info/' + item.id + initParams">
                            <v-tooltip v-if="item.content.length>40" top max-width="600px">
                                <template v-slot:activator="{ on }">
                                    <span v-on="on">{{ item.content.substring(0, 40) }}...</span>
                                </template>
                                <span>{{ item.content }}</span>
                            </v-tooltip>
                            <template v-else>
                                {{ item.content }}
                            </template>
                        </a>
                    </template>
                    <template v-slot:item.link_url="{item}">
                        <div v-if="item.link_url">
                            <a :href="'//' + item.link_url.replace(/^(https?|http):\/\//, '')" target="_blank">あり</a>
                        </div>
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
    name: 'app-info',
    components: {
        CommonDeleteModal,
    },
    data: () => ({
        valid: true,
        dialogDelete: false,
        headers: [
                    { text: 'お知らせ日付', value: 'published_date', sortable: true },
                    { text: '内容', value: 'content', sortable: true, width: '60%' },
                    { text: 'リンク先', value: 'link_url', sortable: true, width: '15%' },
                ],
        infos: [],
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
                    text: 'お知らせ管理',
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
            this.infos = []
            this.selected = []
            let result = this.$store.state.info.infoList
            if(result) {
                this.infos = result.data
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
                await this.$store.dispatch('info/infoList', this.options)
                this.reloadData
            } catch (e) {
                this.error = e.message
            } 
            this.loading = false
        },

        deleteInfos (item) {
            let ids = []
            if(this.selected){
                for(var i = 0; i < this.selected.length; i++) {
                    ids.push(this.selected[i].id)
                }
            }
            this.deleteUrl = 'info/delete?ids=' + ids.toString()
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