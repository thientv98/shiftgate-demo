<template>
    <div>
        <div v-show="showPaginateTop && total">
            <v-row class="justify-center align-center mt-4">
                <div class="text-center" style="width:100%">
                    <v-pagination
                        v-model="currentPage"
                        :length="totalPage"
                        color="transparent"
                        @input="onPageChange"
                    ></v-pagination>
                </div>
            </v-row>
        </div>

        <div v-if="loading">
            <v-row class="justify-center align-center mt-4">
                <div class="text-center" style="width:100%">
                    <v-progress-circular
                        indeterminate
                        :size="70"
                        :width="7"
                        color="primary"
                    ></v-progress-circular>
                </div>
            </v-row>
        </div>

        <v-row class="list-item pt-5" v-for="(item, i) in data" :key="i">
            <v-col cols="12">
                <v-card class="mx-auto item" max-width="100%">
                    <v-card-text>
                        <v-row class="d-flex">
                            <v-col class="pt-0 pb-0" lg="8" md="9" sm="12" cols="12">
                                <nuxt-link :to="{ path: '/car/' + item.id + '/detail?flag=' + flag}">
                                    <v-row >
                                        <v-col cols="12" sm="8" md="5" lg="4" class="hidden-sm-and-up">
                                            <div class="maker-name">{{item.car_name}}</div>
                                            <div class="car-name mt-2">{{item.grade_name}}</div>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="6" lg="6" class="pt-xs-0 pb-xs-0">
                                            <v-img
                                                :src="item.image1 ? item.image1 : '/images/no-image.jpg'"
                                                :lazy-src="item.image1"
                                                aspect-ratio="1.3" class="car-image"
                                                :class="item.is_in_contract == 1 ? 'image-overlay-contract' : (item.is_in_transaction == 1 ? 'image-overlay' : '')"
                                            ></v-img>
                                        </v-col>
                                        <v-col cols="12" sm="8" md="6" lg="6" class="pt-xs-0 pb-xs-0 pb-sm-0">
                                            <div class="maker-name hidden-xs-only">{{item.car_name}}</div>
                                            <div class="car-name mt-2 hidden-xs-only">{{item.grade_name}}</div>
                                            <v-row>
                                                <v-col class="text-center">
                                                    <div class="type">年式</div>
                                                    <hr class="my-1">
                                                    <div class="value">{{ item.first_registration_date ? getYear(item.first_registration_date) + '年 ' : '' }}</div>
                                                    <div class="unit" v-if="item.first_registration_date"><span>{{ calcYear(item.first_registration_date) }}</span></div>
                                                </v-col>
                                                <v-col class="text-center">
                                                    <div class="type">走行距離</div>
                                                    <hr class="my-1">
                                                    <div class="value">{{item.mileage ? formatDecimal(item.mileage) : 0}}</div>
                                                    <div class="unit"><span>km</span></div>
                                                </v-col>
                                                <v-col class="text-center">
                                                    <div class="type">排気量</div>
                                                    <hr class="my-1">
                                                    <div class="value">{{item.engine_displacement ? formatDecimal(item.engine_displacement) : 0}}</div>
                                                    <div class="unit"><span>cc</span></div>
                                                </v-col>
                                                <v-col class="text-center" no-gutters>
                                                    <div class="type">車検有無</div>
                                                    <hr class="my-1">
                                                    <div class="value">{{ item.inspection_date | moment("YYYY年 MM月 DD日") }}</div>
                                                </v-col>
                                            </v-row>
                                            <v-row>
                                                <v-col dense cols="4" md="4" class="text-center pb-0 pl-0 pt-xs-0">
                                                    <span class="price-title">車両本体価格</span>
                                                </v-col>
                                                <v-col dense cols="5" md="5" class="text-center pb-0 pl-0 pt-xs-0">
                                                    <span class="price">{{item.total_price ? formatPrice(item.total_price) : 0}}</span>
                                                    <span class="unit">{{item.total_price < 10000 ? '円' : '万円'}}</span>
                                                </v-col>
                                                <v-col dense cols="3" md="3" class="text-center pb-0 pl-0 pt-xs-0">
                                                    <span class="note">(税込)</span>
                                                </v-col>
                                                <v-col dense class="pt-1">
                                                    <hr>
                                                </v-col>
                                            </v-row>
                                        </v-col>
                                    </v-row>
                                </nuxt-link>
                            </v-col>
                            <v-col cols="12" sm="12" md="3" lg="4" class="pt-sm-0 pt-xs-0 pb-xs-0 pb-sm-0">
                                <v-row dense>
                                    <v-col md="12" sm="4" cols="12">
                                        <v-btn depressed small color="#CFA863" class="tokyo-btn mt-sm-4 mt-md-0">{{ item.prefectures }}</v-btn>
                                    </v-col>

                                    <!-- not login -->
                                    <v-col md="12" sm="4" cols="12" v-show="!user">
                                        <v-btn class="mt-2 favorite-btn text-gray" outlined color="grey darken-1" @click="saveStateWhenLogin('favorite', item)">
                                            ログインをしてから <br> <b class="">お気入りに登録 </b>
                                            <v-icon right color="gray">far fa-star</v-icon>
                                        </v-btn>
                                    </v-col>

                                    <v-col md="12" sm="4" cols="12" v-show="!user && item.is_in_transaction != 1">
                                        <v-btn depressed color="blue darken-4" class="mt-2 quote-btn" @click="saveStateWhenLogin('estimate', item)">
                                            ログインをしてから<br><b>お見積り</b>
                                        </v-btn>
                                    </v-col>

                                    <!-- login -->
                                    <v-col md="12" sm="4" cols="12" v-show="!showTraddingCondition && user">
                                        <v-btn class="mt-2 favorite-btn text-gray" elevation="0" color="grey lighten-2" :outlined="listCarFavorite.indexOf(item.id) > -1 ? false : true"
                                            @click.stop.prevent="favorite(item.id)">
                                            <div v-if="listCarFavorite.indexOf(item.id) > -1">
                                                <b>お気入りに登録済</b>
                                                <v-icon right color="orange">fas fa-star</v-icon>
                                            </div>
                                            <div v-else>
                                                <b>お気入りに登録</b>
                                                <v-icon right color="gray">far fa-star</v-icon>
                                            </div>
                                        </v-btn>
                                    </v-col>
                                    <client-only v-if="item.is_in_transaction != 1">
                                        <v-col md="12" sm="4" cols="12" v-show="!showTraddingCondition && user">
                                            <v-btn depressed color="blue darken-4" class="mt-2 quote-btn" @click="bindingDataToDialog(item)">
                                                <b>お見積り</b>
                                            </v-btn>
                                        </v-col>
                                    </client-only>

                                    <client-only v-if="showTraddingCondition">
                                        <v-col md="12" sm="3" cols="12">
                                            <div class="tradding-condition-title">取引状況</div>
                                        </v-col>
                                        <v-col md="12" sm="5" cols="12" class="pt-0">
                                            <v-row dense>
                                                <v-col md="6" sm="6" cols="6" class="tradding-condition-col">
                                                    <v-btn depressed class="tradding-condition" :color="item.is_in_transaction == 1 ? '#375c7f' : '#D0D0D0'">①見積 / 取引</v-btn>
                                                </v-col>
                                                <v-col md="6" sm="6" cols="6" class="tradding-condition-col">
                                                    <v-btn depressed class="tradding-condition" :color="item.is_in_contract == 1 ? '#375c7f' : '#D0D0D0'">②成約 / 契約</v-btn>
                                                </v-col>
                                                <v-col md="6" sm="6" cols="6" class="tradding-condition-col">
                                                    <v-btn depressed class="tradding-condition" :color="item.is_car_delivery_complete == 1 ? '#375c7f' : '#D0D0D0'">③陸送 / 登録 </v-btn>
                                                </v-col>
                                                <v-col md="6" sm="6" cols="6" class="tradding-condition-col">
                                                    <v-btn depressed class="tradding-condition" :color="item.is_trading_complete == 1 ? '#375c7f' : '#D0D0D0'">④取引完了</v-btn>
                                                </v-col>
                                                <v-col md="12" sm="12" cols="12" class="pt-2">
                                                    取引 No. &nbsp&nbsp{{item.trading_no}} 
                                                </v-col>
                                            </v-row>
                                        </v-col>
                                    </client-only>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>

        <v-row justify="center" align="center" class="mt-4" v-show="total">
            <div class="text-center" style="width:100%">
                <v-pagination
                    v-model="currentPage"
                    :length="totalPage"
                    color="transparent"
                    @input="onPageChange"
                ></v-pagination>
            </div>
        </v-row>

        <!-- No cars available -->
        <v-row justify="center" align="center" class="mt-4" v-show="!total">
            <p>利用可能な車はありません</p>
        </v-row>
        <RequestEstimate :dialog="dialog" :carDetail="carDetail" @bindingData="bindingData" v-show="!total"/>
    </div>

</template>

<script>
import { commonMethod } from '@/plugins/mixins/common.js'
import RequestEstimate from '~/components/car/RequestEstimate.vue'

export default {
    components: {RequestEstimate},
    mixins: [commonMethod],
    props: ['showTraddingCondition','showPaginateTop','url','flag'],
    data () {
        return {
            currentPage: 1,
            data: null,
            error: null,
            listCarFavorite: [],
            totalPage: 0,
            textSearch: '',
            sortById: '',
            sortByFirstRegistrationDate: '',
            sortByMileage: '',
            total: 0,
            dialog: false,
            carDetail: {
                id: null,
                payment_methods: null,
                is_coating: false,
                is_film: false,
                is_warranty_inheritance: false,
                is_electric_components: false,
                is_shift_gate_warranty: false,
                is_other: false,
            },
            loading: true
        }
    },
    async created() {
        try {
            // this.getDataFavorite();
            // this.getDataPaginate();
            // revert data from state
            this.revertDataFromState();

        } catch (e) {
            console.log(e)
            this.error = e
        }
    },
    methods: {
        async revertDataFromState() {
            let revertParamFromState = this.$store.state.search.revertParamFromState
            if (this.user && revertParamFromState && this.$store.state.search.carDetail) {
                this.carDetail = this.$store.state.search.carDetail;
                this.currentPage = this.$store.state.search.currentPage ? this.$store.state.search.currentPage : this.currentPage;

                if(this.$store.state.search.actions == 'estimate') {
                    if(this.carDetail.buyer_id == null) {
                        this.dialog = true;
                        this.$store.commit('search/updateActions', null)
                        this.$store.commit('search/updateCurrentPage', null)
                    }
                    else {
                        this.dialog = false;
                    }
                }
                else {
                    this.favorite(this.carDetail.id)
                }
            }
            if(this.flag != 'search') {
                this.getDataFavorite();
                this.getDataPaginate();
            }
        },

        saveStateWhenLogin(actions, item){
            this.$store.commit('search/revertParamFromState', true)
            this.$store.commit('search/saveCarDetail', item)
            this.$store.commit('search/updateCurrentPage', this.currentPage)
            this.$store.commit('search/updateActions', actions)
            this.linkToUrl('login?revertstate=1')
        },

        async favorite(idCar){
            try {
                await this.$axios.post('update-favorite',{idCar: idCar}).then(res => {
                    this.getDataFavorite();
                    this.getDataPaginate();
                });
            } catch (e) {
                console.log(e)
                this.error = e
            }
        },

        onPageChange() {
            this.getDataPaginate();
            this.revertDataFromState();
        },
        async getDataPaginate() {
            this.loading = true;
            let search = '&text_search=' + this.textSearch;
            let sort = '&sort_by_id=' + this.sortById + '&sort_by_first_registration_date=' + this.sortByFirstRegistrationDate + '&sort_by_mileage=' + this.sortByMileage;
            await this.$axios.get(this.url+'?flag='+this.flag+'&current_page='+this.currentPage+search+sort).then(res => {
                this.data = res.data.data.data;
                this.currentPage = res.data.data.current_page;
                this.totalPage = res.data.data.last_page;
                this.total = res.data.data.total
                this.$emit('bindingData', res.data.data.total);
            });
            this.loading = false;

            this.$store.commit('search/updateBrandSearch', "")
        },
        async getDataFavorite() {
            this.listCarFavorite = [];
            await this.$axios.get('favorite-car').then((res) => {
                res.data.data.forEach(element => {
                    this.listCarFavorite.push(element.id);
                });
            })
        },
        reloadData(textSearch, sortById, sortByFirstRegistrationDate, sortByMileage) {
            this.textSearch = textSearch;
            this.sortById = sortById;
            this.sortByFirstRegistrationDate = sortByFirstRegistrationDate;
            this.sortByMileage = sortByMileage;

            //Save params search to store
            this.$store.commit('search/updateParamsSearch', {
                textSearch: textSearch,
                sortById: sortById,
                sortByFirstRegistrationDate: sortByFirstRegistrationDate,
                sortByMileage: sortByMileage
            })

            try {
                this.getDataFavorite();
                this.getDataPaginate();
            } catch (e) {
                console.log(e)
                this.error = e
            }
        },
        linkToUrl(url) {
            this.$router.push(url);
        },
        bindingData(dialog) {
            this.dialog = dialog;
            this.getDataFavorite();
            this.getDataPaginate();
        },
        bindingDataToDialog(car) {
            this.dialog = true;
            console.log(car)
            this.carDetail = car;
        }
    },
}
</script>
