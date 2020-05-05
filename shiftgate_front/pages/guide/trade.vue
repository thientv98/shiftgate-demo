<template>
    <v-container class="mb-5 text-gray line-height-2 static-page pa-3">
        <v-row align="center" justify="center">
            <div class="list mb-3 ml-3 mr-3">取引ガイド</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>
        <v-row class="text-center pt-3">
            <v-col align="center" class="text-size-5 text-yellow font-weight-bold">基本サービス</v-col>
        </v-row>
        <v-row class="pt-3">
            <v-col class="pt-0 pb-1">
                <h3 class="text-size-3 text-blue font-weight-bold">売買契約支援サービス</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="pt-1 pb-3 pl-7">
               コンシェルジュが輸入車販売のプロとして、売買がスムーズに進むようにお客様をサポートいたします。遠慮なくご相談ください。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">売買契約決済代行サービス</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                電子契約サイン後、SHIFTGATEでは支払いをめぐるトラブルを避けるため中立な第三者を通じて安全な決済を行うため「エスクロー口座」を設けています。<br>
                ※分割払契約等、一部その限りではございません。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">自動車引渡支援サービス</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                出品者様宅からの引き取り・購入者様宅の最寄りの陸運事務所までお車を運び名義変更手続きを代行し新しいナンバーを装着後、陸運事務所でお引渡し致します。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">情報提供サービス</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                SHIFTGATE推奨価格を提供します。<br>
                オークション取引相場、中古車ネット販売実績などを通じて、個人売買向け推奨価格をアドバイスさせていただきます。
            </v-col>
        </v-row>

        <v-row class="text-center pt-7">
            <v-col align="center" class="text-size-5 text-yellow font-weight-bold">会員について</v-col>
        </v-row>

        <v-row class="pa-3">
            <v-col align="center" justify="center" class="font-weight-bold background-yellow px-3 py-7">
                SHIFTGATEプラットフォームをご利用の際は、会員登録を行う必要があります。（無料）
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">会員登録手順は以下の通りです。</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                <ul class="list-style-number dense">
                    <li><a href="/register">こちらのページ</a>より会員登録画面にアクセスしてください。</li>
                    <li>メールアドレス / パスワードを入力して送信してください。</li>
                    <li>送信後、当社より登録したメールアドレス宛にURLを添付致しますので、会員登録を行って頂き完了となります。</li>
                </ul>
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">ログインの方法</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                メールアドレス / パスワードを入力してログインしてください
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">退会の方法</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
              <a href="/withdrawal">こちらのページ</a>から登録したメールアドレス / パスワードを入力してログインして退会手続きを行ってください。<br>
                または、info@shift-gate.jp までご連絡ください。取引中の場合は退会手続きができません。
            </v-col>
        </v-row>

        <v-row class="text-center pt-7">
            <v-col align="center" class="text-size-5 text-yellow font-weight-bold">出品者様・購入者様共通</v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">電子契約</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                売買契約書に出品者様、購入者様それぞれに電子サインをしていただきます。<br>
                売買車両を対象とした個別の売買契約書になりますので相手にご自分の氏名、住所を知られることなく契約可能です。<br>
                但し、出品者が法人の場合および分割払いをご利用の場合は「株式会社MIDネットワーク」との売買契約書となります。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">SHIFTGATE 利用料</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                SHIFTGATEをご利用いただき売買が成立した場合、出品者様・購入者様からそれぞれSHIFTGATE利用料をお支払い頂きます。<br>
                SHIFTGATE利用料は、掲載価格の5.5%（消費税込み）となります。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">安心取引</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                経験豊富なコンシェルジュが、取引を安心かつ安全にサポート致します。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">安全決済</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7" cols="12">
                購入者様には売買契約締結後、5日以内に当社が指定したエスクロー口座にお支払いをお願いいたします。<br>
                購入者様による車両受領確認後、出品者様にこの口座から売買代金をお支払いいたします。<br>
                （なお出品者様の車両に残債が残っていてかつ今回の購入者様の購入代金から残債決済を出品者様が希望するケースではエスクロー口座に入金された代金の一部を所有権者様に送金して残債を処理することがありますのでご了承願います。）<br>
                エスクローとは、物品などの売買に際し、信頼の置ける「中立的な第三者」が契約当事者の間に入り、代金決済等取引の安全性を確保するサービスです。
            </v-col>
            <v-col cols="12" align="center" justify="center">
                <img src="/images/guide/trade/trade_escrow.svg" alt="trade escrow" style="max-height:370px">
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">車輛輸送</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                出品者様からの引き取りから購入者様の最寄りの陸運事務所までお車を運び名義変更手続きを代行し新しいナンバーを装着後、陸運事務所でお引渡しもしくは、ご希望があればご自宅までお届けします。（有料）
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">オプション</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/buyer/buyer_trade_option01.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">ガラスコーティング</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">35,000 円～</v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/buyer/buyer_trade_option02.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">ルームクリーニング</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">35,000 円～</v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/buyer/buyer_trade_option03.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">タイヤ交換もお得に！</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18"></v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/buyer/buyer_trade_option04.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">最新オービスにも対応したレーダー取付</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">49,800 円～</v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/trade/buyer_trade_option05.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">トラブル未然防止！</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">ドライブレコーダーもお得に！</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">39,800 円～</v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/trade/buyer_trade_option06.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">弊社オリジナル LINKDRIVE を付ければ、</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">定期メンテナンス等のお知らせなど</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">お得な情報が取れます。</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">詳しくはお問い合わせください。</v-col>
                </v-row>
            </v-col>
            <v-col cols="12" class="pl-7">※オプション別途費用が必要となります。（例：電装品取り付け・ボディーコーティング・内装清掃等）</v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">自動車検査協会で安心購入</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                出品された車輛については、抵当権や事件に巻き込まれたことがないかの確認をしております。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1">
                <h3 class="text-size-3 text-blue font-weight-bold">キャンセル・返品について</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7">
                売買契約成立後は、キャンセル返品はできません。<br>
                瑕疵担保期間（重大な事象）については、別途利用規約をご参照ください。
            </v-col>
        </v-row>
    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '取引ガイド' }
    },
    name: 'guide-trade',
    components: {
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
}
</script>
