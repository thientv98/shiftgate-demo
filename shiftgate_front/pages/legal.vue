<template>
    <v-container class="mb-5 text-gray line-height-2 static-page">
        <v-row align="center" justify="center">
            <div class="list mb-3 ml-3 mr-3">特定商取引に基づく表示</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>
        <v-row class="py-5 pl-1 table-legal text-gray" dense>
            <v-col cols="3" class="table-title first">SHIFTGATE運営会社</v-col>
            <v-col cols="9" class="first">株式会社SHIFTGATE</v-col>

            <v-col cols="3" class="table-title">代表者</v-col>
            <v-col cols="9">相川 政二</v-col>

            <v-col cols="3" class="table-title">所在地</v-col>
            <v-col cols="9">東京都中央区銀座七丁目3番5号</v-col>

            <v-col cols="3" class="table-title">電話番号</v-col>
            <v-col cols="9">0120-915-237</v-col>

            <v-col cols="3" class="table-title">
                ホームページ <br><br>
                メールアドレス
            </v-col>
            <v-col cols="9">
                https://shift-gate.co.jp/ <br><br>
                info@shift-gate.jp
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                <div>お問い合わせ</div>
            </v-col>
            <v-col cols="9">
                SHIFTGATE運営事務局 <br>
                TEL：0120-915-237 <br>
                営業時間：10:00～18:00（原則火曜日を除く）<br>
              <a href="/contact" style="font-size:16px">お問い合わせはこちら</a>
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                販売価格
            </v-col>
            <v-col cols="9">
              <a href="/search" style="font-size:16px">商品紹介ページをご参照ください。</a>
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                商品代金以外に必要なサービス利用の手数料及び費用
            </v-col>
            <v-col cols="9" class="pa-0">
                <v-row dense class="ma-0">
                    <v-col class="remove-boder-left col-7-2"></v-col>
                    <v-col class="remove-boder-left col-2-4">出品者</v-col>
                    <v-col class="remove-boder-left remove-boder-right col-2-4">購入者</v-col>

                    <v-col class="remove-boder-left d-flex align-center col-4-8">売買契約支援サービス</v-col>
                    <v-col class="remove-boder-left remove-boder-right pa-0 col-7-2">
                        <v-row dense class="ma-0 remove-boder-left ">
                            <v-col cols="4" class="remove-boder-left d-flex align-center">サービス利用料</v-col>
                            <v-col cols="4" class="remove-boder-left d-flex align-center">車両本体価格の 5.5%(消費税込)</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center">車両本体価格の 5.5%(消費税込)</v-col>

                            <v-col cols="4" class="remove-boder-left d-flex align-center">査定サービス料</v-col>
                            <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">実費</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">実費</v-col>

                            <v-col cols="4" class="remove-boder-left d-flex align-center">ローン残債確認サービス料</v-col>
                            <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">無料</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">ー</v-col>

                            <v-col cols="4" class="remove-boder-left d-flex align-center">出品掲載料</v-col>
                            <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">無料</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">ー</v-col>

                            <v-col cols="4" class="remove-boder-left remove-boder-bottom d-flex align-center">出品期間</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-bottom d-flex align-center">最大30日間（再掲載別途相談）</v-col>
                            <v-col cols="4" class="remove-boder-left remove-boder-bottom remove-boder-right d-flex align-center justify-center">ー</v-col>
                        </v-row>
                    </v-col>

                    <v-col class="remove-boder-left col-7-2 d-flex align-center">代金決済代行サービス</v-col>
                    <v-col class="remove-boder-left col-2-4">無料<br>(1送金先まで)</v-col>
                    <v-col class="remove-boder-left remove-boder-right col-2-4 d-flex align-center justify-center">無料</v-col>

                    <v-col class="remove-boder-left remove-boder-bottom col-2-4 d-flex align-center justify-center">自動車引渡支援サービス</v-col>
                    <v-col class="remove-boder-left col-9-6 pa-0 remove-boder-right remove-boder-bottom">
                        <v-row dense class="ma-0">
                            <v-col cols="3" class="remove-boder-left d-flex align-center">登録手続代行サービス料</v-col>
                            <v-col cols="9" class="remove-boder-left remove-boder-right remove-boder-bottom pa-0">
                                <v-row dense class="ma-0">
                                    <v-col cols="4" class="remove-boder-left">所有権解除代行サービス料</v-col>
                                    <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">無料</v-col>
                                    <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">ー</v-col>

                                    <v-col cols="4" class="remove-boder-left">検査登録届手続き代行</v-col>
                                    <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">ー</v-col>
                                    <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">36,000円</v-col>

                                    <v-col cols="4" class="remove-boder-left">希望ナンバー取得</v-col>
                                    <v-col cols="4" class="remove-boder-left d-flex align-center justify-center">ー</v-col>
                                    <v-col cols="4" class="remove-boder-left remove-boder-right d-flex align-center justify-center">12,000円</v-col>
                                </v-row>
                            </v-col>

                            <v-col cols="6" class="remove-boder-left d-flex align-center">車庫証明手続代行サービス料</v-col>
                            <v-col cols="3" class="remove-boder-left d-flex align-center justify-center">ー</v-col>
                            <v-col cols="3" class="remove-boder-left remove-boder-right d-flex align-center justify-center">16,000円</v-col>

                            <v-col cols="6" class="remove-boder-left remove-boder-bottom d-flex align-center">輸送納車サービス料</v-col>
                            <v-col cols="3" class="remove-boder-left remove-boder-bottom d-flex align-center justify-center">ー</v-col>
                            <v-col cols="3" class="remove-boder-left remove-boder-right remove-boder-bottom d-flex align-center justify-center">車種及び輸送距離等に基づき都度算出いたします</v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                車両代金及び関連費用等のお支払い方法
            </v-col>
            <v-col cols="9" class="d-flex align-center">
                銀行振込
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                車両代金及び関連費用等のお支払い時期
            </v-col>
            <v-col cols="9" class="d-flex align-center">
                当社からの支払い通知を受けた日から５営業日以内にお支払いいただきます。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                取引車両のお引き渡し時期
            </v-col>
            <v-col cols="9" class="d-flex align-center">
                商品代金の入金およびお車の登録手続き（名義変更含む）に必要な各種必要書類のご提出を受けた後、速やかに実施いたします。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                取引キャンセルの可否と条件
            </v-col>
            <v-col cols="9" class="d-flex align-center">
                サービスの性質上、キャンセルはお受けしておりません。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                利用規約について
            </v-col>
            <v-col cols="9">
                違反行為がなされた場合に損害金が発生することがございます。<br>
                詳しくは 利用規約をご確認ください。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                動作環境
            </v-col>
            <v-col cols="9" class="pa-0 remove-boder-right">
                <v-row dense class="ma-0">
                    <v-col cols="5" class="remove-boder-left d-flex align-center">
                        PCからの <br>
                        利用推奨ブラウザ
                    </v-col>
                    <v-col cols="7" class="remove-boder-left">
                        【Windows】 <br>
                        ・Google Chrome 最新版 <br>
                        ・Firefox 最新版 <br>
                        【Mac】<br>
                        ・Safari 最新版 <br>
                        ・Google Chrome 最新版 <br>
                        ・Firefox 最新版
                    </v-col>

                    <v-col cols="5" class="remove-boder-left remove-boder-bottom d-flex align-center">
                        スマートフォンからの <br>
                        利用推奨ブラウザ
                    </v-col>
                    <v-col cols="7" class="remove-boder-left remove-boder-bottom">
                        下記OSにおける、<br>
                        標準搭載ブラウザからの利用を推奨 <br>
                        ・iOS：最新版 <br>
                        ・Android：最新版
                    </v-col>
                </v-row>
            </v-col>
        </v-row>

        <v-row align="center" justify="center" class="pt-10">
          <div class="list mb-3 ml-3 mr-3">古物営業法に基づく表示</div>
          <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>

        <v-row class="py-5 pl-1 table-legal text-gray" dense>
          <v-col cols="3" class="table-title first">古物商許可番号</v-col>
          <v-col cols="9" class="first">東京都公安委員会　第301062004699号</v-col>

          <v-col cols="3" class="table-title">交付</v-col>
          <v-col cols="9">令和2年3月13日</v-col>
        </v-row>

        <v-row align="center" justify="center" class="pt-10">
            <div class="list mb-3 ml-3 mr-3">特定商取引に基づく表示</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>
        <v-row class="py-5 pl-1 table-legal text-gray" dense>
            <v-col cols="3" class="table-title first">SHIFTGATE運営会社</v-col>
            <v-col cols="9" class="first">株式会社MIDネットワーク</v-col>

            <v-col cols="3" class="table-title">代表者</v-col>
            <v-col cols="9">相川 政二</v-col>

            <v-col cols="3" class="table-title">所在地</v-col>
            <v-col cols="9">東京都中央区銀座七丁目3番5号</v-col>

            <v-col cols="3" class="table-title">電話番号</v-col>
            <v-col cols="9">0120-910-822</v-col>

            <v-col cols="3" class="table-title">
                ホームページ
            </v-col>
            <v-col cols="9">
                <a href="https://www.g735gallery.com/top/" style="font-size:16px">https://www.g735gallery.com/top/</a>
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                メールアドレス
            </v-col>
            <v-col cols="9">
                上記ホームページよりメール問い合わせ<br>
                商品サービス<br>
                委託販売<br>
                採用に関して
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                お問い合わせ
            </v-col>
            <v-col cols="9">
                株式会社MIDネットワーク　G735Gallery<br>
                電話：0120-910-822<br>
                営業時間：11:00～19:00（火曜日定休）
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                販売価格
            </v-col>
            <v-col cols="9">
                <a href="/search" style="font-size:16px">SHIFTGATE商品掲載ページをご覧ください</a>
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                車両代金及び関連費用等のお支払い方法
            </v-col>
            <v-col cols="9">
                銀行振込<br>
                提携ローン会社によるオートローン
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                車両代金及び関連費用等のお支払い時期
            </v-col>
            <v-col cols="9">
                当社からの支払い通知を受けた日から５営業日以内にお支払いいただきます。<br>
                オートローンご利用の場合は提携ローン会社の手続きに基づきます。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                取引車両のお引き渡し時期
            </v-col>
            <v-col cols="9">
                商品代金の入金およびお車の登録手続き（名義変更含む）に必要な各種必要書類のご提出を受けた後、速やかに実施いたします。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                取引キャンセルの可否と条件
            </v-col>
            <v-col cols="9">
                サービスの性質上、キャンセルはお受けしておりません。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                利用規約について
            </v-col>
            <v-col cols="9">
                違反行為がなされた場合に損害金が発生することがございます。 <br>
                詳しくはSHIFTGATE 利用規約をご確認ください。
            </v-col>

            <v-col cols="3" class="table-title d-flex align-center">
                動作環境
            </v-col>
            <v-col cols="9" class="pa-0 remove-boder-right">
                <v-row dense class="ma-0">
                    <v-col cols="5" class="remove-boder-left d-flex align-center">
                        PCからの <br>
                        利用推奨ブラウザ
                    </v-col>
                    <v-col cols="7" class="remove-boder-left">
                        【Windows】 <br>
                        ・Google Chrome 最新版 <br>
                        ・Firefox 最新版 <br>
                        【Mac】<br>
                        ・Safari 最新版 <br>
                        ・Google Chrome 最新版 <br>
                        ・Firefox 最新版
                    </v-col>

                    <v-col cols="5" class="remove-boder-left remove-boder-bottom d-flex align-center">
                        スマートフォンからの <br>
                        利用推奨ブラウザ
                    </v-col>
                    <v-col cols="7" class="remove-boder-left remove-boder-bottom">
                        下記OSにおける、<br>
                        標準搭載ブラウザからの利用を推奨 <br>
                        ・iOS：最新版 <br>
                        ・Android：最新版
                    </v-col>
                </v-row>
            </v-col>
        </v-row>

        <v-row align="center" justify="center" class="pt-10">
            <div class="list mb-3 ml-3 mr-3">古物営業法に基づく表示</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>

        <v-row class="py-5 pl-1 table-legal text-gray" dense>
            <v-col cols="3" class="table-title first">古物商許可番号</v-col>
            <v-col cols="9" class="first">東京都公安委員会　第301062005185号</v-col>

            <v-col cols="3" class="table-title">交付</v-col>
            <v-col cols="9">令和2年4月27日</v-col>
        </v-row>
    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '特定商取引に基づく表示' }
    },
    name: 'legal',
    components: {
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
}
</script>
