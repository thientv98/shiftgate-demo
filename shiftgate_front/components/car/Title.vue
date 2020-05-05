<template>
    <div class="car-detail-title">
        <v-row>
            <v-col class="car-detail-name title-before py-1" lg="8" md="8" sm="8" cols="12">
                {{ carDetail ? carDetail.car_name : ''}} <br v-show="carDetail.car_name"> {{ carDetail ? carDetail.grade_name : ''}}
            </v-col>
            <v-col lg="4" md="4" sm="4" cols="12" class="py-1">
                <v-btn depressed small color="#F2F1F1" class="prefecture-btn float-right w-xs-100">{{ carPrefecture ? carPrefecture.name : '' }}</v-btn>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'car-title',
    components: {},
    props: ['carDetail', 'carPrefecture'],
    data() {
        return {}
    },

    methods: {},

    computed: {},
} 
</script>

<style>
.prefecture-btn .v-btn__content {
    margin-top: -4px;
}    
</style>
