<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">顧客管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>

        <v-card class="mt-5 form-data sh-toggle" ref="form" flat tile="">
               
            <v-card-actions class="pa-4">
                <v-subheader>検索項目</v-subheader>
                <v-spacer></v-spacer>
                <v-btn icon @click="toggleSearch()">
                    <v-icon class="sh-icon">mdi-plus</v-icon>
                </v-btn>
            </v-card-actions>

            <div class="sh-search search-hidden">
                <v-divider></v-divider>

                <v-card-text>
                    <v-container>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0" cols="12" md="3">
                                        <v-subheader>顧客ID</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.id"
                                            v-model="search.id"
                                            data-vv-name="search.id"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0" cols="12" md="3">
                                        <v-subheader>氏名</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.name"
                                            v-model="search.name"
                                            data-vv-name="search.name"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0" cols="12" md="3">
                                        <v-subheader>電話番号</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.phone"
                                            v-model="search.phone"
                                            data-vv-name="search.phone"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0" cols="12" md="3">
                                        <v-subheader>生年月日</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <!-- <v-text-field outlined dense
                                                    ref="search.birthdate_from"
                                                    v-model="search.birthdate_from"
                                                    data-vv-name="search.birthdate_from"
                                                ></v-text-field> -->

                                                <v-menu
                                                    v-model="popup_bf"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="search.birthdate_from=null"
                                                            v-model="search.birthdate_from"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.birthdate_from"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_bf"
                                                        @input="popup_bf=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <!-- <v-text-field outlined dense
                                                    ref="search.birthdate_to"
                                                    v-model="search.birthdate_to"
                                                    data-vv-name="search.birthdate_to"
                                                ></v-text-field> -->

                                                <v-menu
                                                    v-model="popup_bt"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="search.birthdate_to=null"
                                                            v-model="search.birthdate_to"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.birthdate_to"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_bt"
                                                        @input="popup_bt=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0" cols="12" md="3">
                                        <v-subheader>登録日</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <!-- <v-text-field outlined dense
                                                    ref="search.created_from"
                                                    v-model="search.created_from"
                                                    data-vv-name="search.created_from"
                                                ></v-text-field> -->

                                                <v-menu
                                                    v-model="popup_cf"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="search.created_from=null"
                                                            v-model="search.created_from"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.created_from"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_cf"
                                                        @input="popup_cf=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <!-- <v-text-field outlined dense
                                                    ref="search.created_to"
                                                    v-model="search.created_to"
                                                    data-vv-name="search.created_to"
                                                ></v-text-field> -->

                                                <v-menu
                                                    v-model="popup_ct"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="search.created_to=null"
                                                            v-model="search.created_to"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.created_to"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_ct"
                                                        @input="popup_ct=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>                                
                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn color="success" @click="init">保存</v-btn>
                </v-card-actions>
            </div>
        </v-card>
        
        <v-card class="mt-5 form-data" ref="form" flat tile="">
               
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn class="primary" :to="{ path: '/member/create'}">新規登録</v-btn>
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
                    <template v-slot:item.id="{item}">
                        <a :href="'/member/' + item.id + initParams">{{ item.id }}</a>
                    </template>

                    <template v-slot:item.last_name="{item}">{{ item.last_name }}{{ item.first_name }}</template>

                    <template v-slot:item.mobile_phone_number="{item}">
                        {{ item.mobile_phone_number }} {{ item.fixed_phone_number ? '/' : '' }} {{ item.fixed_phone_number }}
                    </template>

                    <template v-slot:item.birthdate="{item}">{{ item.birthdate_ymd }}</template>

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
    name: 'app-member',
    components: {
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
        reactive_bf: true,
        reactive_bt: true,
        popup_bf: false,
        popup_bt: false,
        reactive_cf: true,
        reactive_ct: true,
        popup_cf: false,
        popup_ct: false,
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
            this.options.page = this.$route.query.page ? this.$route.query.page : 1
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

        toggleSearch() {
            Util.toggleSearch();
        },
    },
} 
</script>

<style scoped>
.v-content .form-data .item-row .v-subheader{
    font-size: 0.875rem;
}
</style>