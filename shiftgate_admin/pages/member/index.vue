<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">顧客管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>

        <member-search 
            :params="search"
            @reloadList="reloadList"
            ></member-search>
        
        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile="">
               
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn tile class="primary" :to="{ path: '/member/create'}">新規登録</v-btn>
                <v-btn tile color="error" @click="deleteUsers">削除</v-btn>
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
                    <template v-slot:body="{ items }">
                        <tbody>
                            <tr v-for="item in items" :key="item.id" v-bind:class="silverClass(item.withdrawal_date)">
                                <td><v-checkbox v-slot:item.data-table-select="{ item }" :value="item" v-model="selected"></v-checkbox></td>
                                <td><a :href="'/member/' + item.id + initParams">{{ formatID(item.id, item.type) }}</a></td>
                                <td>{{ item.last_name }}{{ item.first_name }}</td>
                                <td>{{ item.mobile_phone_number }} {{ item.fixed_phone_number ? '/' : '' }} {{ item.fixed_phone_number }}</td>
                                <td>{{ item.birthdate_ymd }}</td>
                                <td><v-btn depressed class="change-status" color="green" @click="linkToRoute(item.id)">お気に入り</v-btn></td>
                            </tr>
                        </tbody>
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
import MemberSearch from '@/components/member/search'
import CommonDeleteModal from '@/components/modals/common/delete'

export default {
    name: 'app-member',
    components: {
        MemberSearch,
        CommonDeleteModal,
    },
    data: () => ({
        flat: true,
        valid: true,
        dialogDelete: false,
        headers: [
                    { text: '顧客ID', value: 'id', sortable: true },
                    { text: '氏名', value: 'last_name', sortable: true, width: '25%' },
                    { text: '電話番号', value: 'mobile_phone_number', sortable: true, width: '35%' },
                    { text: '生年月日', value: 'birthdate', sortable: true, width: '20%' },
                    { text: '', value: 'actions', sortable: false}
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
                    text: '顧客管理',
                    href: '',
                }
            ],
        search: {
            id: '',
            name: '',
            phone: '',
            birthdate_from: '',
            created_from: '',
            birthdate_to: '',
            created_to: '',
        },
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
            return '?' + Util.serializeObj(Object.assign(this.options, this.search))
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

            let obj = this.search
            for (var p in obj) {
                if (this.$route.query[p]) {
                    this.search[p] = this.$route.query[p]
                }
            }
        },
        reloadData() {
            this.users = []
            this.selected = []
            let result = this.$store.state.user.memberList
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
            let obj = this.search
            for (var p in obj) {
                if (obj[p] == null) obj[p] = ''
            }
            try {
                await this.$store.dispatch('user/memberList', Object.assign(this.options, this.search))
                this.reloadData
            } catch (e) {
                this.error = e.message
            } 
            this.loading = false
        },

        reloadList (params) {
            this.search = params
            this.init()
        },

        deleteUsers (item) {
            let ids = []
            if(this.selected){
                for(var i = 0; i < this.selected.length; i++) {
                    ids.push(this.selected[i].id)
                }
            }
            this.deleteUrl = 'member/delete?ids=' + ids.toString()
            this.dialogDelete = true
        }, 

        closeModal() {
            this.dialogDelete = false
        },

        formatID(id, type) {
            return Util.paddy(id, 8, type)
        },

        silverClass (type) {
            return type != null ? 'custom-silver' : ''
        },

        // toggleSearch() {
        //     Util.toggleSearch();
        // },

        getColor(withdrawal_date) {
            if (withdrawal_date) 
                return "background-color: silver;";
            return '';
        },

        linkToRoute(id){
            this.$router.push('/member/' + id + '/favorite')
        },
    },
} 
</script>

<style scoped>
.custom-silver {
    background: silver;
}
</style>