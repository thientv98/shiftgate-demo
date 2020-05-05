<template>
    <v-layout>
        <v-container fluid class="pa-0">
            <v-container class="mb-15 text-gray line-height-2 static-page">
                <v-row align="center" justify="center">
                    <div class="list mb-3 ml-3 mr-3">シフトゲートの特徴</div>
                    <div class="list-line mb-3 mr-3 ml-3"></div>
                </v-row>
                <v-row class="pt-1">
                    <v-col class="d-flex align-center justify-center text-center font-weight-bold text-gray" cols="12">
                        高級輸入車に特化した個人間売買をお手伝いするプラットフォームです。<br>
                        輸入車正規ディーラーとの業務提携により実現した安心の取引サービスです。
                    </v-col>
                </v-row>
                <v-row class="pt-3 mb-10">
                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_01.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">スマホでかんたん無料出品</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        スマホを使った簡単出品。<br>
                                        出品料無料・消費税なし（個人間売買の場合）
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_02.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">分割払いも可能</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        提携ローン会社をご紹介いたします。
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_03.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">経験豊富なコンシェルジュによるフルサポート</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        出品価格のアドバイス、手続き代行、サービス工場の
                                        ご案内など、経験豊富なコンシェルジュがお客様を
                                        手厚くサポートいたします。
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_04.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">あんしんの売買システム</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        売買成立・納車までの安心システムと預かり金口座
                                        にてお金もしっかり管理で安心。
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_05.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">匿名取引</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        お取引に際しお客様同士が連絡を取り合う事はありません。<br>
                                        コンシェルジュが間に入り対応いたします。
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                    <v-col lg="6" md="6" sm="6" cols="12">
                        <v-row dense>
                            <v-col lg="3" md="3" sm="4" cols="3" class="pt-3">
                                <img src="/images/icon/feature_icon_06.png" alt="" width="100%" height="auto" class="icon-features">
                            </v-col>
                            <v-col lg="9" md="9" sm="8" cols="9">
                                <v-row dense>
                                    <v-col cols="12" class="font-weight-bold text-blue text-size-2">高級輸入車専門</v-col>
                                    <v-col cols="12" class="text-gray pl-4">
                                        高級輸入車専門の取引プラットフォームです。<br>
                                        業務提携している輸入車正規ディーラーもお客様を
                                        サポートいたします。
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-col>

                </v-row>
            </v-container>
            <Contact />
        </v-container>
    </v-layout>
</template>

<script>
import Contact from '~/components/home/Contact.vue'

export default {
    name: 'company-feature',
    components: {
        Contact
    },
    head () {
      return { title: 'シフトゲートの特徴' }
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
}
</script>
