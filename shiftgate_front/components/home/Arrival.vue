<template>
    <div class="arrival-section">
        <v-container>
            <v-row class="branch">
                <v-col class="title-name new-arrival" sm="12" md="12" lg="12" xs="12" cols="12">NEW ARRIVAL</v-col>
            </v-row>
            <v-row>
                <v-col
                    v-for="item in carList"
                    :key="item.id"
                    xs="6"
                    cols="6"
                    sm="4"
                    md="4"
                    lg="3"
                    class="arrival-item"
                >
                    <nuxt-link :to="{ path: '/car/' + item.id + '/detail'}">
                        <v-card class="mx-auto item pt-1 px-1">
                            <v-img
                                :src="carImage(item.image1)"
                                aspect-ratio="1.3"
                                :class="item.is_in_contract == 1 ? 'image-overlay-contract' : (item.is_in_transaction == 1 ? 'image-overlay' : '')"
                            ></v-img>
                            <v-row class="px-1" dense>
                                <v-col md="7" sm="12" cols="12">
                                    <div class="title-arrival">{{ item.car_name }}</div>
                                    <div class="title-arrival">{{ item.grade_name }}</div>
                                    <div class="title-arrival">{{ !item.grade_name || !item.car_name ? '&nbsp' : ''}}</div>
                                    <div class="year">年式：{{ item.first_registration_date ? getYear(item.first_registration_date) + '年 ' + calcYear(item.first_registration_date) : '' }}</div>
                                    <div class="km">走行距離：{{ formatDecimal(item.mileage) }}km</div>
                                    <div class="year">車検有無<span class="font-weight-bold">:</span> {{ item.inspection_date ? formatYear(item.inspection_date) : '' }}</div>
                                </v-col>
                                <v-col md="5" sm="12" cols="12" class="info-right px-0">
                                    <div class="arrival-info pa-1">
                                        <div class="info-cover">
                                            <span class="number">{{item.total_price ? formatPrice(item.total_price) : 0}}</span>
                                            <span class="unit">{{item.total_price < 10000 ? '円' : '万円'}}</span>
                                        </div>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-card>
                    </nuxt-link>
                </v-col>
            </v-row>
            <v-row class="justify-center align-center">
                <v-btn class="effect effect-1 ma-2 search-button view-more-arrival" @click="changeRevert()" title="掲載一覧">掲載一覧</v-btn>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import { commonMethod } from '@/plugins/mixins/common.js'
import moment from "moment";

export default {
    mixins: [commonMethod],
    data() {
        return {
            carList: []
        }
    },
    created() {
        this.getCarList()
    },
    methods: {
        getCarList() {
            try {
                this.$axios.get("/car-list").then(res => {
                    this.carList = res.data.data
                })
            } catch (e) {
                console.log(e.response)
            }
        },
        carImage(image) {
            return image ? image : '/images/no-image.jpg'
        },
        formatPrice(price) {
            return price >= 10000 ? price/10000 : price
        },
        changeRevert() {
            this.$store.commit('search/revertParamFromState', false)
            this.$router.push('/search');
        },
        formatYear(date) {
            return moment(date).format("YYYY年MM月DD日")
        },
    }
}
</script>
