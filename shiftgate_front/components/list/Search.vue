<template>
    <div>
        <v-row align="center" justify="center">
            <div class="list mb-3">掲載車両一覧</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>
        <v-row class="search">
            <v-col class="search-title" md="2" sm="3" cols="12" xs="12">
                <label class="font-weight-bold" for="">キーワード検索</label>
            </v-col>
            <v-col md="10" sm="9" class="search-group">
                <div class="prepend">
                    <i class="fas fa-search"></i>
                </div>
                <v-text-field outlined dense
                    placeholder="例）ベンツ AMG G63"
                    v-model="textSearchClone"
                ></v-text-field>
            </v-col>
        </v-row>
        <v-row class="justify-center align-center">
            <v-btn class="effect effect-1 ma-2 search-button" @click="bindingSearch" title="掲載車両検索">掲載車両検索</v-btn>
        </v-row>

        <v-row>
            <v-col cols="12" class="pb-0 font-weight-bold">検索ワード：{{textSearchClone}}</v-col>
            <v-col cols="12" class="pt-0 pb-0">
                <v-row class="align-center">
                    <v-col xs="3" sm="6" md="8" cols="3" class="total-result py-0 pr-0" no-gutters>
                        {{ formatDecimal(total) }}台
                    </v-col>
                    <v-col xs="3" sm="2" md="1" cols="3" class="pb-0">
                        <v-row>
                            <v-col no-gutters cols="12" class="text-center pb-0 pt-0 sort">
                                新着
                            </v-col>
                            <v-col no-gutters cols="12" class="text-center pt-0 sort">
                                <nuxt-link to="" class="sortLink" id="cars_id_desc" v-on:click.native="sort('cars_id','desc')">新</nuxt-link>｜
                                <nuxt-link to="" class="sortLink" id="cars_id_asc" v-on:click.native="sort('cars_id','asc')">古</nuxt-link>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col xs="3" sm="2" md="1" cols="3" class="pb-0">
                        <v-row>
                            <v-col no-gutters cols="12" class="text-center pb-0 pt-0 sort">
                                年式
                            </v-col>
                            <v-col no-gutters cols="12" class="text-center pt-0 sort">
                                <nuxt-link to="" class="sortLink" id="cars_first_registration_date_desc" v-on:click.native="sort('cars_first_registration_date','desc')">新</nuxt-link>｜
                                <nuxt-link to="" class="sortLink" id="cars_first_registration_date_asc" v-on:click.native="sort('cars_first_registration_date','asc')">古</nuxt-link>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col xs="3" class="pb-0 pl-0" sm="2" md="1" cols="3">
                        <v-row>
                            <v-col no-gutters cols="12" class="text-center pt-0 pb-0">
                                走行距離
                            </v-col>
                            <v-col no-gutters cols="12" class="text-center pt-0 sort">
                                <nuxt-link to="" class="sortLink" id="cars_mileage_desc" v-on:click.native="sort('cars_mileage','desc')">多</nuxt-link>｜
                                <nuxt-link to="" class="sortLink" id="cars_mileage_asc" v-on:click.native="sort('cars_mileage','asc')">少</nuxt-link>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>
            <div class="line2 mr-3 ml-3 mt-1"></div>
        </v-row>
    </div>
</template>

<script>
import JQuery from 'jquery'
let $ = JQuery

export default {
    props: ['total'],
    data () {
        return {
            textSearchClone: ''
        }
    },
    computed: {
        paramsSearch: function () {
            let revertParamFromState = this.$store.state.search.revertParamFromState

            this.textSearchClone = this.$store.state.search.textSearchBrand ? this.$store.state.search.textSearchBrand :  this.textSearchClone

            if(revertParamFromState){
                this.textSearchClone = this.$store.state.search.paramsSearch.textSearch
                // this.$store.commit('search/resetRevertStatus')
                return this.$store.state.search.paramsSearch
            }

            return {
                textSearch: null || this.textSearchClone,
                sortById: '',
                sortByFirstRegistrationDate: '',
                sortByMileage: ''
            }
        }
    },
    mounted() {
        if(this.paramsSearch.sortById != "")
            $('#cars_id_'+this.paramsSearch.sortById).addClass('active')
        if(this.paramsSearch.sortByFirstRegistrationDate != "")
            $('#cars_first_registration_date_'+this.paramsSearch.sortByFirstRegistrationDate).addClass('active')
        if(this.paramsSearch.sortByMileage != "")
            $('#cars_mileage_'+this.paramsSearch.sortByMileage).addClass('active')

        this.bindingSearch()
    },
    methods: {
        bindingSearch () {
            this.$emit('searchData', this.textSearchClone, this.paramsSearch.sortById, this.paramsSearch.sortByFirstRegistrationDate, this.paramsSearch.sortByMileage);
        },
        formatDecimal(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        sort(flag,sortBy) {
            $('.sortLink').removeClass('active')
            $('#'+flag+'_'+sortBy).addClass('active')
            this.paramsSearch.sortById = '';
            this.paramsSearch.sortByFirstRegistrationDate = '';
            this.paramsSearch.sortByMileage = '';

            if(flag == "cars_id")
                this.paramsSearch.sortById = this.paramsSearch.sortById == sortBy ? '' : this.paramsSearch.sortById = sortBy;

            if(flag == "cars_first_registration_date")
                this.paramsSearch.sortByFirstRegistrationDate = this.paramsSearch.sortByFirstRegistrationDate == sortBy ? '' : this.paramsSearch.sortByFirstRegistrationDate = sortBy;

            if(flag == "cars_mileage")
                this.paramsSearch.sortByMileage = this.paramsSearch.sortByMileage == sortBy ? '' : this.paramsSearch.sortByMileage = sortBy;

            this.bindingSearch();
        }
    },
}
</script>
