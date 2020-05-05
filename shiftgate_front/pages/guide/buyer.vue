<template>
    <div>
    <v-container class="mb-15 text-gray line-height-2 static-page">
        <v-row align="center" justify="center">
            <div class="list mb-3 ml-3 mr-3">購入者 / 車を買いたい方</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>

        <v-row class="pt-3">
            <v-col class="pt-0 pb-1">
                <h3 class="text-size-3 text-blue font-weight-bold">購入ステップ</h3>
            </v-col>
        </v-row>
        <v-row align="center" justify="center" class="px-3 pb-0">
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step01.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step02.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step03.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step04.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step05.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step06.svg" alt="">
                </div>
            </v-col>
            <v-col lg="3" md="3" sm="4" cols="6" class="pa-1 py-5 col-sp-12">
                <div>
                    <img src="/images/guide/buyer/buyer_step07.svg" alt="">
                </div>
            </v-col>
        </v-row>
        <v-row align="center" justify="center" class="px-3 pb-1 pt-0">
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <a href="#required-documents" class="title-link">
                    <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">名義変更・必要書類</div>
                </a>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <a href="#assurance-inheritance" class="title-link">
                    <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">保証継承</div>
                </a>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <a href="#option" class="title-link">
                    <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">オプション</div>
                </a>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <a href="#installment-payment" class="title-link">
                    <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">分割払い</div>
                </a>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <a href="#trade-car" class="title-link">
                    <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">下取り車</div>
                </a>
            </v-col>
            <!-- <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">保証継承</div>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">オプション</div>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">下取り車のご相談</div>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">分割払いをご検討の方</div>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">自検協で安心購入</div>
            </v-col>
            <v-col class="col-lg-2-4 px-1 pb-5" md="3" sm="4" cols="6">
                <div class="background-orange-2 pa-3 text-center border-radius-5 font-weight-bold">自動車税</div>
            </v-col> -->
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1" id="required-documents">
                <h3 class="text-size-3 text-blue font-weight-bold">名義変更・必要書類</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7" cols="12">
                ご自身でご準備いただくものがあります。<br>
                手続きはコンシェルジュが手配いたします。<br><br>
                <b>１．　名義人になる方の印鑑証明</b>（発行日より 3 カ月以内のもの）<br>
                <b>２．　委任状</b>（実印の捺印）
            </v-col>
            <v-col cols="12" class="pl-5">
                <img src="/images/guide/buyer/guide-buyer01.png" alt="" style="max-width: 500px; width: inherit;">
            </v-col>
            <v-col class="pt-1 pb-0 pl-7" cols="12">
                <b>３．　車庫証明</b><br>
                <div style="padding-left: 29px">
                    ・車庫証明申請書（各都道府県で用紙が異なります。）<br>
                    ・保管場所（自認書・承諾書どちらか）<br>
                    ・見取り図・配置図
                </div>
            </v-col>
            <v-col cols="12" class="pl-7">
                <img src="/images/guide/buyer/guide-buyer04.svg" alt="" style="max-width: 830px; width: inherit;">
                <div class="pl-7">
                    ※１　保管場所使用承諾証明書 が用意できない場合、駐車場の賃貸借契約書のコピーで可の場合もあります。<br>
                    ※２　本人が申請書類を提出する場合のみ。本人以外が提出する場合はコピーが必要です。
                </div>
            </v-col>
        </v-row>

        <v-row class="pl-10 pr-6">
          <v-row class="background-yellow">
            <v-col cols="12" class="font-weight-bold pl-6 pb-0 text-size-2">
                車庫証明申請書
            </v-col>
            <v-col md="6" cols="12" class="pt-0 pb-xs-0 pb-sm-0 pb-md-3 pl-5">
                <img src="/images/guide/buyer/guide-buyer02.png" alt="" style="max-width: 600px; width: inherit;">
            </v-col>
            <v-col md="6" cols="12" class="pl-7 pt-md-2 pt-xs-0 pt-sm-0">
                ➀メーカー名を記載<br>
                ➁右詰めで寸法を記載<br>
                ➂上段：自動車の自宅住所<br>
                　下段：車庫の住所（自宅と車庫の距離は 2 キロ以内）<br>
                ➃自動車の使用者の住所、氏名、電話番号を記載<br>
                ➄車庫の所有者を選択<br>
                　・自己（自認書）<br>
                　・他人（車庫の契約書又は保管場所使用承諾書）<br>
                　・共有（共有者全員の使用承諾書）<br>
                代替か新規購入かを選択して〇をつける
            </v-col>
          </v-row>

          <v-row class="background-yellow mt-10">
              <v-col cols="12" class="font-weight-bold pl-6 pb-0 text-size-2">
                  見取り図・配置図
              </v-col>
              <v-col md="6" cols="12" class="pt-0 pb-xs-0 pb-sm-0 pb-md-3 pl-4">
                  <img src="/images/guide/buyer/guide-buyer06.png" alt="" style="max-width: 600px; width: inherit;">
              </v-col>
              <v-col md="6" cols="12" class="pl-7 pt-md-2 pt-xs-0 pt-sm-0">
                  ➀地図を手書きまたは Web 図でも可。<br>
                  　<div class="pl-3">駅、学校などの目標となるものを記載して自宅と車庫を直線で結び、その距離を記載。</div><br>
                  ➁自宅の場合は、敷地記載、車庫を赤く枠をする車庫のサイズ、周囲の建物、道路幅を記載。
              </v-col>
          </v-row>

          <v-row class="background-yellow mt-10">
              <v-col cols="12" class="font-weight-bold pl-7 pb-0 text-size-2">
                  保管場所
              </v-col>
              <v-col md="6" cols="12" class="pt-0 pb-0 pl-5">
                  <img src="/images/guide/buyer/guide-buyer03.png" alt="" style="max-width: 600px; width: inherit;">
              </v-col>
              <v-col md="6" cols="12" class="pl-6 pt-md-2 pt-xs-0 pt-sm-0 pb-md-0">
                  ➀小型車・普通車は「証明申請」、軽自動車は「届け出」を選択。<br>
                  ➁車庫が築造されている場合は「建物」にも〇を付ける。
              </v-col>

              <v-col md="6" cols="12" class="pt-0 pb-0 ">
                  <img src="/images/guide/buyer/guide-buyer05.png" alt="" style="max-width: 600px; width: inherit;">
              </v-col>
              <v-col md="6" cols="12" class="pl-6 pt-md-2 pt-xs-0 pt-sm-0 pb-md-0">
                  ➀車庫の住所を記載<br>
                  ➁使用者の住所を記載<br>
                  ➂使用者と契約者が同じ場合も記載<br>
                  ➃異なる場合は、該当のものに〇を付ける<br>
                  ➄車庫の契約期間を記載<br>
                  ➅車庫の所有者または管理者の署名捺印<br>
              </v-col>
          </v-row>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1" id="assurance-inheritance">
                <h3 class="text-size-3 text-blue font-weight-bold">保証継承（メーカー保証の継承）</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7" cols="12">
                メーカー保証期間内の車両で購入者様が保証を継承されたい場合は正規ディーラーで保証継承点検を受ける必要があります。<br>
                ご希望があればコンシェルジュがご手配致します。<br>
                下記に該当するお車については、購入者様のご希望で、保証継承点検後（有償）保証を継承することができます。<br>
                １．正規輸入車ディーラーにて販売された車両<br>
                ２．新車登録年月日より 3 年間以内（またはメーカー保証期間内）<br>
                ３．保証継承する車両が購入者様の名義になっていること<br><br>
                【ご留意事項】保証継承点検は名義変更後に有償で受けることが可能です。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1" id="option">
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
                        <img src="/images/guide/buyer/buyer_trade_option05.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">トラブル未然防止！</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">ドライブレコーダーもお得に！</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">39,800 円～</v-col>
                </v-row>
            </v-col>

            <v-col cols="12" sm="6" md="4" lg="4">
                <v-row dense>
                    <v-col cols="12" align="center" justify="center" class="pb-0">
                        <img src="/images/guide/buyer/buyer_trade_option06.svg" alt="" style="max-height:180px">
                    </v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">弊社オリジナル LINKDRIVE を付ければ、</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">定期メンテナンス等のお知らせなど</v-col>
                    <v-col cols="12" align="center" justify="center"  class="py-0 line-height-18">お得な情報が取れます。</v-col>
                    <v-col cols="12" align="center" justify="center" class="py-0 line-height-18">詳しくはお問い合わせください。 </v-col>
                </v-row>
            </v-col>
            <v-col cols="12" class="pl-7">※オプション別途費用が必要となります。（例：電装品取り付け・ボディーコーティング・内装清掃等）</v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1" id="installment-payment">
                <h3 class="text-size-3 text-blue font-weight-bold">分割払い</h3>
            </v-col>
        </v-row>
        <v-row>
            <v-col class="py-1 pl-7" cols="12">
                分割払いでご購入希望の場合はコンシェルジュにその旨お伝えください。提携ローン会社をご紹介いたします。<br>
                この場合、出品者様からの直接取引ではなく株式会社 MID ネットワークとの購入取引となります。
            </v-col>
        </v-row>

        <v-row class="pt-4">
            <v-col class="py-1" id="trade-car">
                <h3 class="text-size-3 text-blue font-weight-bold">下取り車</h3>
            </v-col>
        </v-row>
        <v-row class="pb-4">
            <v-col class="py-1 pl-7" cols="12">
                今回の購入に際し今お乗りの車両の下取りをご希望の場合はコンシェルジュにご相談ください。株式会社 MID ネットワークでも買取らせて頂きます。
            </v-col>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>


      <v-row class="text-center pt-0">
        <v-col align="center" class="text-size-5 text-yellow font-weight-bold">購入の 5 つのメリット</v-col>
      </v-row>

      <v-row class="pt-3 pb-6 px-7" justify="center">
        <v-col cols="12" sm="6" md="4" lg="4">
          <v-row dense>
            <v-col cols="12" class="pb-1">
              <img src="/images/guide/buyer/buyer_merit01.svg" alt="">
            </v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">個人間売買には消費税がかかりません。</v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">掲載車両には当該年の自動車税込で販売。</v-col>
          </v-row>
        </v-col>

        <v-col cols="12" sm="6" md="4" lg="4">
          <v-row dense>
            <v-col cols="12" class="pb-1">
              <img src="/images/guide/buyer/buyer_merit02.svg" alt="">
            </v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">経験豊富なコンシェルジュがお客様を丁寧にサポートします。</v-col>
          </v-row>
        </v-col>

        <v-col cols="12" sm="6" md="4" lg="4">
          <v-row dense>
            <v-col cols="12" align="center" justify="center" class="pb-1">
              <img src="/images/guide/buyer/buyer_merit03.svg" alt="">
            </v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">分割払いご希望の場合は提携ローン会社をご紹介します。</v-col>
          </v-row>
        </v-col>

        <v-col cols="12" sm="6" md="4" lg="4">
          <v-row dense>
            <v-col cols="12" align="center" justify="center" class="pb-1">
              <img src="/images/guide/buyer/buyer_merit04.svg" alt="">
            </v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">当サイトでの取引は当事者間で直接連絡を取ることはありません。</v-col>
          </v-row>
        </v-col>

        <v-col cols="12" sm="6" md="4" lg="4">
          <v-row dense>
            <v-col cols="12" align="center" justify="center" class="pb-1">
              <img src="/images/guide/buyer/buyer_merit05.svg" alt="">
            </v-col>
            <v-col cols="12" class="py-1 line-height-18 text-center">ご希望に応じて、有償保証をご案内しております。</v-col>
          </v-row>
        </v-col>
      </v-row>

        <v-row class="text-center py-6">
            <v-col align="center" class="text-size-5 text-yellow font-weight-bold">ご不明な点があれば、コンシェルジュまでご相談下さい。</v-col>
        </v-row>
    </v-container>
    <Contact />
    </div>
</template>

<script>

import Contact from '~/components/home/Contact.vue'

export default {
    head () {
      return { title: '購入者 / 車を買いたい方' }
    },
    name: 'guide-buyer',
    components: {
        Contact
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
}
</script>
