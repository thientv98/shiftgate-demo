<template>
    <div class="equipment">
        <v-row>
            <v-col class="title-before font-weight-bold text-size-2 text-blue d-flex">
                装備・状態
            </v-col>
        </v-row>
        <v-row class="pl-2 pr-2">
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.repair_history_code==0 ? 'background-blue-1': 'background-orange-1'">修復履歴なし</div>
            </v-col>
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.navi_code>1 ? 'background-blue-1': 'background-orange-1'">カーナビ</div>
            </v-col>
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.leather_seat_code==1 ? 'background-blue-1': 'background-orange-1'">革シート</div>
            </v-col>
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">ワンオーナー</div>
            </v-col-->
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">エアコン</div>
            </v-col-->
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">ABS</div>
            </v-col-->
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.sunroof_code>1 ? 'background-blue-1': 'background-orange-1'">サンルーフ</div>
            </v-col>
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.tv_code==1 ? 'background-blue-1': 'background-orange-1'">テレビ</div>
            </v-col>  
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">キーレス</div>
            </v-col-->
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">CDチェン</div>
            </v-col-->
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-orange-1">エアバッグ</div>
            </v-col-->
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.aluminum_wheel_code>1 ? 'background-blue-1': 'background-orange-1'">アルミホイール</div>
            </v-col>
            <!--v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text background-gray-1">禁煙車</div>
            </v-col-->
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.warranty_code==1 ? 'background-blue-1': 'background-orange-1'">保証書</div>
            </v-col>
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.instruction_car_code==1 ? 'background-blue-1': 'background-orange-1'">取扱説明書</div>
            </v-col>
            <v-col lg="4" md="4" sm="6" cols="6" class="pa-1 text-center">
                <div class="equipment-text" :class="carDetail.record_note_code==1 ? 'background-blue-1': 'background-orange-1'">記録簿・整備手帳</div>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" class="text-left pt-0">
                <p class="mb-0 pa-3 pl-0 line-height-23">
                    ・メーカー保証期間内(3年)の車両については正規ディーラーにて保証継承点検を受けることで残期間の保証が継承可能です。<br>
                    メーカー保証期間外の場合は有償の保証をご準備しています。
                </p>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'car-equipment',
    components: {},
    props: ['carDetail'],
    data() {
        return {}
    },

    methods: {},

    computed: {},
} 
</script>

<style>
    
</style>