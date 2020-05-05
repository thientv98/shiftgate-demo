<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">お気に入り一覧</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>

        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile="">
            <v-card-actions class="pa-4">
                <v-subheader>お気に入り一覧 ({{userFavorite.last_name}} {{userFavorite.first_name}} 様)</v-subheader>
            </v-card-actions>

            <v-divider></v-divider>

            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="records"
                    :options.sync="options"
                    :server-items-length="totalRecords"
                    :loading="loading"
                    :footer-props="footerProps"
                    @click:row="itemClick"
                    class="elevation-1 possition-relative table-list-questions">

                    <template v-slot:item.first_registration_date="{item}" >
                        {{item.first_registration_date | moment("YYYY/MM/DD")}}
                    </template>
                    <!-- Slot Column Actions -->
                    <template v-slot:item.customer_type="{item}" >
                        {{item.customer_type == 'C' ? '顧客' : 'ディーラー'}}
                    </template>

                    <!-- Slot Column Actions -->
                    <template v-slot:item.published_date="{item}" >
                        {{item.published_date | moment("YYYY/MM/DD")}}
                    </template>

                    <!-- Slot Column Actions -->
                    <template v-slot:item.actions="{item}">
                        <v-btn depressed class="change-status" :disabled="loading" :color="item.is_in_transaction ? 'warning': 'gray'">見積/取引</v-btn>
                        <v-btn depressed class="change-status" :disabled="loading" :color="item.is_in_contract ? 'warning': 'gray'">成約/契約</v-btn>
                        <v-btn depressed class="change-status" :disabled="loading" :color="item.is_car_delivery_complete ? 'warning': 'gray'">陸送/登録</v-btn>
                        <v-btn depressed class="change-status" :disabled="loading" :color="item.is_trading_complete ? 'warning': 'gray'">取引完了</v-btn>
                    </template>

                    <template v-slot:footer.page-text="pageText">
                        <span v-if="pageText.itemsLength">
                            {{ pageText.pageStart }} ~ {{ pageText.pageStop }} / {{ pageText.itemsLength }}
                        </span>
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
import Util from '@/util';
import Constant from '@/config/constants';

export default {
    data () {
        return {
            keyLocalStore: 'filter-trade',
            restore_list_data: false,
            formSearch: {
            },
            masterData: {},
            totalRecords: 0,
            records: [],
            makers: [],
            models: [],
            status_code:[],
            loading: true,
            options: {},
            selectedItems: [],
            headers: [
                { text: 'ID', value: 'id' },
                { text: '取引No', value: 'trading_no' },
                { text: 'メーカー', value: 'maker_name' },
                { text: '車種', value: 'car_name' },
                { text: '年式', value: 'first_registration_date' },
                { text: '売り主種類', value: 'customer_type' },
                { text: '公開', value: 'statuses_code' },
                { text: '公開日', value: 'published_date' },
                { text: '', value: 'actions', sortable: false}
            ],
            activeSearch: null,
            firstPage: false,
            pageText: {
                pageStart: 0,
                pageStop: 0,
                itemsLength: 0
            },
            footerProps: {
                'items-per-page-options': Constant.ITEM_PER_PAGE_OPTIONS,
                'items-per-page-text': "ページごとの行："
            },
            breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: '顧客管理',
                    href: '/member',
                },
                {
                    text: 'お気に入り一覧',
                    href: '',
                }
            ],
            userFavorite: {}
        }
    },
    watch: {
        options: {
            handler () {
                this.firstPage = false
                this.setFiltersToStore()
                this.getDataFromApi()
            }
        },
    },
    methods: {
        setFiltersToStore(){
            if(location.hash == '#restore-list-data'){
                location.hash = ''
                this.options = this.getFiltersFromStore('options')
                this.formSearch = JSON.parse(JSON.stringify(this.getFiltersFromStore('form-search')))
                this.restore_list_data = true
            }else{
                localStorage.setItem(this.keyLocalStore + '-options', JSON.stringify(this.options))
                localStorage.setItem(this.keyLocalStore + '-form-search', JSON.stringify(this.formSearch))
            }
        },
        getFiltersFromStore(type = ''){
            if(type == ''){
                let options = JSON.parse(localStorage.getItem(this.keyLocalStore + '-options'))
                let search = JSON.parse(localStorage.getItem(this.keyLocalStore + '-form-search'))
                return Object.assign(options, search)
            }
            return JSON.parse(localStorage.getItem(this.keyLocalStore + '-' + type) || "[]");
        },
        selectModalsFooter(){
            if(this.selectedItems.length > 0){
                this.activeModal = this.activeModalFooter
                console.log('this.activeModal', this.activeModal)
            }
        },
        toogleSearch(){
            this.activeSearch = !this.activeSearch
        },
        linkToRoute(link){
            this.$router.push(link);
        },
        submitSearch(data){
            this.formSearch = data
            this.restore_list_data = false
            this.firstPage = true
            this.setFiltersToStore()
            this.getDataFromApi()
        },
        reloadFilterData(){
            this.selectedItems = []
            this.getDataFromApi()
        },
        getDataFromApi() {
            if(this.firstPage == true) {
                this.options.page = 1;
            }
            let queryString = Util.serializeObj(this.getFiltersFromStore())
            try {
                this.loading = true
                this.$axios.get('member/' + this.$route.params.id + '/favorite?'+queryString).then((res) => {
                    this.totalRecords = res.data.data.records.total;
                    this.records = res.data.data.records.data;
                    this.userFavorite = res.data.data.userFavorite;
                    this.loading = false;
                })
            } catch (e) {
                console.log(e.message)
            }
        },
        itemClick(item) {
            window.open(process.env.BASE_URL +`/trade/${item.id}/detail`, "_blank")
        },
        changeStatus(id, field, value) {
            this.loading = true
            this.$axios
                .post("trade/update-status", {
                    id: id,
                    field: field,
                    value: value
                })
                .then(res => {
                    this.getDataFromApi()
                })
                .catch(err => {
                    console.log(err.message)
                })
        },
    }
}
</script>

<style>
.activeColor{
    background-color: grey;
}
.v-data-table td{
    cursor: pointer !important;
}
.change-status{
    border-radius: 0px;
    border: 1px solid #e4e4e4;
}
</style>