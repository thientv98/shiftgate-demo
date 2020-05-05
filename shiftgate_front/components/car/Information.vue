<template>
    <div class="information">
        <v-row>
            <v-col class="title-before font-weight-bold text-size-2 text-blue d-flex">
                基本情報
            </v-col>
        </v-row>
        <v-row>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-0 order-sm-0 order-md-0">
                <v-row dense class="border-bottom-gray h-100 border-top-gray pt-1">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        年式(初年度登録）
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail ? carDetail.model_year : ''}} 年
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-6 order-sm-6 order-md-1">
                <v-row dense class="border-bottom-gray h-100 border-top-gray-md-and-up pt-sm-0 pt-md-1">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        ハンドル
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.steering_place_code : ''}} 
                    </v-col>
                </v-row>
            </v-col>

            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-1 order-sm-1 order-md-2">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        走行距離
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail ? formatNumber(carDetail.mileage) : ''}} km
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-7 order-sm-7 order-md-3">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        ドア数
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail ? carDetail.door_count : ''}}
                    </v-col>
                </v-row>
            </v-col>

            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-2 order-sm-2 order-md-4">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        排気量
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail ? formatNumber(carDetail.engine_displacement) : ''}} cc
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-8 order-sm-8 order-md-5">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        乗車定員
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail&&carDetail.seating_capacity ? carDetail.seating_capacity + '名' : ''}} 
                    </v-col>
                </v-row>
            </v-col>

            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-3 order-sm-3 order-md-6">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        燃料
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.engine_fuel_code : ''}}
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-9 order-sm-9 order-md-7">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        色
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.color_category_code : ''}}
                    </v-col>
                </v-row>
            </v-col>

            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-4 order-sm-4 order-md-8">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        ミッション
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.transmission_type_code : ''}}
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-10 order-sm-10 order-md-9">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        リサイクル料
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.recycle_ticket_code : ''}}
                    </v-col>
                </v-row>
            </v-col>

            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-5 order-sm-5 order-md-10">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        駆動
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carInformation ? carInformation.drive_shaft_code : ''}} 
                    </v-col>
                </v-row>
            </v-col>
            <v-col lg="6" md="6" sm="12" cols="12" class="py-1 order-xs-11 order-sm-11 order-md-11">
                <v-row dense class="border-bottom-gray h-100">
                    <v-col lg="6" md="6" sm="6" cols="6" class="font-weight-bold text-gray">
                        車台番号
                    </v-col>
                    <v-col lg="6" md="6" sm="6" cols="6">
                        {{ carDetail ? getChassis(carDetail.chassis_num) : ''}} 
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import axios from 'axios'
import moment from "moment";

export default {
    name: 'car-info',
    components: {},
    props: ['carDetail', 'carInformation'],
    data() {
        return {}
    },

    methods: {
        formatDate(date) {
            return moment(date).format("YYYY/MM/DD")
        },
        formatNumber(value){
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        getChassis(chassis_num){
            if(chassis_num){
                for(let i=0; i< chassis_num.length - 3; i ++){
                    if(chassis_num[i] != '-'){
                        chassis_num = chassis_num.substring(0, i) + '*' + chassis_num.substring(i + 1)
                    }
                }
            }
            
            return chassis_num
        },
    },

    computed: {},
}
</script>

<style>

</style>
