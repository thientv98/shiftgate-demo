<template>
    <v-footer app class="footer" :fixed="false">
        <v-container fluid>
            <v-row align="start" justify="center" no-gutters class="row-image-footer">
                <v-col md="6" sm="12" cols="12" @click="goToHomePage()">
                    <v-img :src="`/images/index/shiftgate_logo.png`" class="logo-footer" contain></v-img>
                    <!-- <img src="/images/index/shiftgate_logo.png" alt="" class="logo-footer" contain> -->
                </v-col>
                <v-col md="6" sm="12" cols="12" class="pl-md-10 pl-lg-10">
                    <v-row class="pb-3" align="start" justify="center" no-gutters>
                        <v-col class="mr-3 offset-sm-3 offset-xs-1 offset-md-0 item-footer-1">
                            <div>
                                <img src="/images/index/footer_icon.png" alt />
                                <nuxt-link to="/company/features">シフトゲートの特徴</nuxt-link>
                            </div>
                        </v-col>
                        <v-col class="item-footer-1">
                            <div>
                                <img src="/images/index/footer_icon.png" alt />
                                <nuxt-link to="/guide/buyer">車を買いたい方</nuxt-link>
                            </div>
                        </v-col>
                    </v-row>
                    <v-row align="center" justify="center" no-gutters>
                        <v-col class="mr-3 offset-sm-3 offset-xs-1 offset-md-0 item-footer-1">
                            <div>
                                <img src="/images/index/footer_icon.png" alt />
                                <nuxt-link to="/guide/trade">取引ガイド</nuxt-link>
                            </div>
                        </v-col>
                        <v-col class="item-footer-1">
                            <div>
                                <img src="/images/index/footer_icon.png" alt />
                                <nuxt-link to="/guide/seller">車を売りたい方</nuxt-link>
                            </div>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
            <v-row class="justify-center align-center hidden-sm-and-down">
                <div class="item-footer">
                    <nuxt-link to="/company/info">会社概要</nuxt-link>
                </div>
                <div class="item-footer">
                    <nuxt-link to="/legal">特定商取引法に基づく表記</nuxt-link>
                </div>
                <div class="item-footer">
                    <nuxt-link to="/terms">利用規約</nuxt-link>
                </div>
                <div class="item-footer">
                    <nuxt-link to="/contact">お問い合わせ</nuxt-link>
                </div>
            </v-row>

            <v-row class="justify-center align-center hidden-md-and-up mt-5">
                <div class="item-footer">
                    <nuxt-link to="/company/info">会社概要</nuxt-link>
                </div>
                <div class="item-footer">
                    <nuxt-link to="/legal">特定商取引法に基づく表記</nuxt-link>
                </div>
            </v-row>
            <v-row class="justify-center align-center hidden-md-and-up mt-1">
                <div class="item-footer">
                    <nuxt-link to="/terms">利用規約</nuxt-link>
                </div>
                <div class="item-footer">
                    <nuxt-link to="/contact">お問い合わせ</nuxt-link>
                </div>
            </v-row>

            <v-row class="justify-center align-top pt-5">
                <div style="font-size: 12px">© 2020 SHIFTGATE Co. LTD. All Rights Reserved.</div>
            </v-row>
        </v-container>
    </v-footer>
</template>

<script>
export default {
    methods: {
       goToHomePage() {
           this.$router.push('/');
       }
    }
}
</script>

<style lang="scss" scoped>
.row-image-footer {
    .logo-footer:hover {
        cursor: pointer;
    }
}
</style>
