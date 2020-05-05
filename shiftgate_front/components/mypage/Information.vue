<template>
    <v-tab-item value="mypage">
        <v-card flat color="basil" class="information-tab">
            <v-row class="d-flex">
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-0">
                    <v-row class="pa-2 row-value">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">お客様 ID</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{customerId}}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-6">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">連絡先</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.fixed_phone_number : ''}}</span>
                        </v-col>
                        <div class="bottom-line-even"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-1">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">入会日</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{ userDetail ? userDetail.created_at : '' | moment("YYYY.MM.DD") }}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-7">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">携帯番号</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.mobile_phone_number : ''}}</span>
                        </v-col>
                        <div class="bottom-line-even"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-2">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">カタカナ</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.last_name_kana : ''}} {{userDetail ? userDetail.first_name_kana : ''}}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-8">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">アドレス</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.email : ''}}</span>
                        </v-col>
                        <div class="bottom-line-even"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-3">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">氏名</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.last_name : ''}} {{userDetail ? userDetail.first_name : ''}}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-4">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">郵便番号</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{userDetail ? userDetail.zipcode : ''}}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-5">
                    <v-row class="row-value pa-2">
                        <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                            <label for="" class="name">住所</label>
                        </v-col>
                        <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                            <span class="value">{{prefectureName}} {{userDetail ? userDetail.address : ''}}</span>
                        </v-col>
                        <div class="bottom-line"></div>
                    </v-row>
                </v-col>
                <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                </v-col>
            </v-row>
            
            <v-row class="justify-center align-center mt-12">
                <v-btn depressed large color="#375c7f" class="change-info-btn px-10" @click="edit">登録情報変更</v-btn>
            </v-row>
        </v-card>
    </v-tab-item>
</template>

<script>

export default {
    props: ['userDetail', 'prefectureName'],
    data () {
        return {}
    },
    methods: {
        edit () {
            this.$router.push('/mypage?type=edit');
        },
    },
    computed: {
        customerId (){
            return this.userDetail.type ? this.userDetail.type + String(this.userDetail.id).padStart(8, '0') : ''
        }
    },
}
</script>