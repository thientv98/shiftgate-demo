<template>
  <div class="model-detail">
    <v-row class="px-lg-7 px-md-5">
        <v-col class="text-center px-sm-1 px-xs-1 px-md-3">
            <div class="type">年式</div>
            <hr class="my-1" />
            <div class="value">{{ carDetail.first_registration_date ? getYear(carDetail.first_registration_date) + '年 ' : '' }}</div>
            <div class="unit" v-if="carDetail.first_registration_date"><span>{{ calcYear(carDetail.first_registration_date) }}</span></div>
        </v-col>
        <v-col class="text-center px-sm-1 px-xs-1 px-md-3">
            <div class="type">走行距離</div>
            <hr class="my-1" />
            <div class="value">{{ carDetail ? formatNumber(carDetail.mileage) : '' }}</div>
            <div class="unit">
            <span>km</span>
            </div>
        </v-col>
        <v-col class="text-center px-sm-1 px-xs-1 px-md-3">
            <div class="type">排気量</div>
            <hr class="my-1" />
            <div class="value">{{ carDetail ? formatNumber(carDetail.engine_displacement) : '' }}</div>
            <div class="unit">
                <span>cc</span>
            </div>
        </v-col>
        <v-col class="text-center px-sm-1 px-xs-1 px-md-3">
            <div class="type">車検有無</div>
            <hr class="my-1" />
            <div class="value">{{ carDetail.inspection_date ? formatYear(carDetail.inspection_date) : '' }}</div>
            <div class="unit">
                <span>{{ carDetail.inspection_date ? formatMonth(carDetail.inspection_date) : '' }}</span>
            </div>
        </v-col>
    </v-row>
    <v-row class="px-lg-7 px-md-5">
        <v-col dense cols="4" md="4" class="text-center pb-0 pl-xs-3 pl-md-0 pt-5">
            <span class="price-title">車両本体価格</span>
        </v-col>
        <v-col dense cols="5" md="5" class="text-center pb-0 pl-0">
            <span class="price">{{ carDetail ? formatInJapanese(carDetail.total_price) : '' }}</span>
            <span class="unit2" >万円</span>
        </v-col>
        <v-col dense cols="3" md="3" class="text-center pb-0 pl-0 pt-5">
            <span class="note">(税込)</span>
        </v-col>
        <v-col dense class="pt-1">
            <hr>
        </v-col>
    </v-row>
    <div class="shipping py-3 px-3">
        <div class="shipping-title text-center pa-2">
            お住まいの地域への輸送料
        </div>
        <div v-if="userPrefecture" class="shipping-fee text-center pa-2">
            <b class="text-size-2">{{ carPrefecture ? carPrefecture.name : '' }}</b> から 
            <b class="text-size-2">{{ userPrefecture ? userPrefecture.name : '' }}</b> まで およそ 
            <b class="text-size-2 text-blue">{{ landTransportationFee ? formatNumber(landTransportationFee.fee) : 0 }}円</b>
        </div>
        <div v-else class="shipping-fee text-center pa-2">
            <b class="text-size-2">ログイン後、およその輸送量が表示されます</b>
            <!-- 会員登録してログインをすると表示されます -->
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import moment from "moment";
import { commonMethod } from '@/plugins/mixins/common.js'

export default {
    name: 'car-model',
    components: {},
    mixins: [commonMethod],
    props: ['carDetail', 'carPrefecture', 'userPrefecture', 'landTransportationFee'],
    data() {
        return {}
    },

    methods: {
        formatYear(date) {
            return moment(date).format("YYYY年")
        },
        formatMonth(date) {
            return moment(date).format("MM月 DD日")
        },
        formatNumber(value){
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        formatInJapanese(value) {
            let formatted = 0
            if (value > 10000) {
                let unitValue = Math.floor(value / 10000)
                formatted = unitValue
                value -= unitValue * 10000
            }
            if (value != 0) {
                formatted += value / 10000
            }
            return formatted;
        },
    },

    computed: {},
} 
</script>

<style>
    
</style>