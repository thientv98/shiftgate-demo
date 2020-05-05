<template>
  <v-container>
    <v-card-title class="pt-0 pb-0">取引状況</v-card-title>
    <v-row class="item-row button-select">
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn
            :disabled="loading_transaction"
            :color="inTransactionColor"
            @click="changeStatus('is_in_transaction', !detailData.is_in_transaction)"
          >見積/取引</v-btn>
        </div>
      </v-col>
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn
            :disabled="loading_contract"
            :color="inContractColor"
            @click="changeStatus('is_in_contract', !detailData.is_in_contract)"
          >成約/契約</v-btn>
        </div>
      </v-col>
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn
            :disabled="loading_delivery"
            :color="carDeliveryCompleteColor"
            @click="changeStatus('is_car_delivery_complete', !detailData.is_car_delivery_complete)"
          >陸送/登録</v-btn>
        </div>
      </v-col>
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn
            :disabled="loading_trade_complete"
            :color="tradingCompleteColor"
            @click="changeStatus('is_trading_complete', !detailData.is_trading_complete)"
          >取引完了</v-btn>
        </div>
      </v-col>
    </v-row>
    <v-row class="item-row">
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn style="pointer-events: none;"
            :color="isSellerConsentColor"
          >{{ isSellerConsentText }}</v-btn>
          <!-- <span :class="isSellerConsentColor">{{ isSellerConsentText }}</span> -->
        </div>
      </v-col>
      <v-col class="pb-0 row-padding" cols="3" md="3">
        <div class="my-2">
          <v-btn style="pointer-events: none;"
            :color="isBuyerConsentColor"
          >{{ isBuyerConsentText }}</v-btn>
          <!-- <span :class="isBuyerConsentColor">{{ isBuyerConsentText }}</span> -->
        </div>
      </v-col>
    </v-row>
    <v-row class="item-row">
      <v-col class="pb-0 row-padding" cols="12" md="6">
        <v-row>
          <v-col class="pb-0" cols="12" md="12">
            <p class="mb-0 title-input">
              <span>取引No</span>
              <v-icon>mdi-svg</v-icon>
            </p>
            <v-text-field
              outlined
              dense
              v-model="detailData.trading_no"
              :error-messages="errors.trading_no ? errors.trading_no[0] : ''"
            ></v-text-field>
          </v-col>
        </v-row>
      </v-col>
      <!--
      <v-col class="pb-0 row-padding" cols="12" md="6">
        <v-row>
          <v-col class="pb-0" cols="12" md="12">
            <p class="mb-0 title-input">
              <span>ディーラー紹介コード</span>
            </p>
            <v-text-field
              outlined
              dense
              :error-messages="errors.dealer_introduction_code ? errors.dealer_introduction_code[0] : ''"
              v-model="detailData.dealer_introduction_code"
            ></v-text-field>
          </v-col>
        </v-row>
      </v-col>
      -->
    </v-row>
        <v-row class="item-row">
      <v-col class="pb-0 row-padding" cols="12" md="6">
        <v-row>
          <v-col class="pb-0" cols="12" md="12">
            <p class="mb-0 title-input">
              <span>売り主紹介コード</span>
            </p>
            <v-text-field
              outlined
              dense
              v-model="detailData.seller_introduction_code"
              :error-messages="errors.seller_introduction_code ? errors.seller_introduction_code[0] : ''"
            ></v-text-field>
          </v-col>
        </v-row>
      </v-col>
      <v-col class="pb-0 row-padding" cols="12" md="6">
        <v-row>
          <v-col class="pb-0" cols="12" md="12">
            <p class="mb-0 title-input">
              <span>買い主紹介コード</span>
            </p>
            <v-text-field
              outlined
              dense
              :error-messages="errors.buyer_introduction_code ? errors.buyer_introduction_code[0] : ''"
              v-model="detailData.buyer_introduction_code"
            ></v-text-field>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-row class="item-row">
      <v-col class="pb-0 row-padding" cols="12" md="12">
        <v-row>
          <v-col class="pb-0" cols="12" md="12">
            <p class="mb-0 title-input">
              <span>取引メモ</span>
            </p>
            <v-textarea
              outlined
              dense
              v-model="detailData.trading_memo"
              :error-messages="errors.trading_memo ? errors.trading_memo[0] : ''"
            ></v-textarea>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
    <v-card-actions class="px-4 py-0">
      <v-spacer></v-spacer>
      <v-btn color="primary" @click="submit()" :disabled="submitting">保存</v-btn>
    </v-card-actions>
  </v-container>
</template>

<script>
export default {
  name: "trading-condition",
  props: ["tradeDetail"],
  data() {
    return {
      loading_transaction: false,
      loading_contract: false,
      loading_delivery: false,
      loading_trade_complete: false,
      submitting: false
    }
  },
  computed: {
    detailData() {
      return this.tradeDetail
    },
    inTransactionColor() {
      return this.tradeDetail.is_in_transaction ? "warning" : "gray"
    },
    inContractColor() {
      return this.tradeDetail.is_in_contract ? "warning" : "gray"
    },
    carDeliveryCompleteColor() {
      return this.tradeDetail.is_car_delivery_complete ? "warning" : "gray"
    },
    tradingCompleteColor() {
      return this.tradeDetail.is_trading_complete ? "warning" : "gray"
    },
    isSellerConsentText() {
      return this.tradeDetail.is_seller_consent == 1 ? "売り主承諾 済" : "売り主承諾 未"
    },
    isSellerConsentColor() {
      return this.tradeDetail.is_seller_consent == 1 ? "warning" : "gray"
    },
    isBuyerConsentText() {
      return this.tradeDetail.is_buyer_consent == 1 ? "買い主承諾 済" : "買い主承諾 未"
    },
    isBuyerConsentColor() {
      return this.tradeDetail.is_buyer_consent == 1 ? "warning" : "gray"
    }
  },
  methods: {
    changeStatus(field, value) {
      if (field == "is_in_transaction") {
        this.loading_transaction = true
      } else if (field == "is_in_contract") {
        this.loading_contract = true
      } else if (field == "is_car_delivery_complete") {
        this.loading_delivery = true
      } else {
        this.loading_trade_complete = true
      }
      this.$axios
        .post("trade/update-status", {
          id: this.$route.params.id,
          field: field,
          value: value
        })
        .then(res => {
          if (field == "is_in_transaction") {
            setTimeout(() => {
              this.loading_transaction = false
            }, 800)
          } else if (field == "is_in_contract") {
            setTimeout(() => {
              this.loading_contract = false
            }, 800)
          } else if (field == "is_car_delivery_complete") {
            setTimeout(() => {
              this.loading_delivery = false
            }, 800)
          } else {
            setTimeout(() => {
              this.loading_trade_complete = false
            }, 800)
          }
          this.$emit("getNewData")
        })
        .catch(err => {
          console.log(err.message)
        })
    },
    submit() {
      this.submitting = true
      this.$axios
        .post("trade/update-trading-condition", {
          id: this.$route.params.id,
          trading_no: this.detailData.trading_no,
          dealer_introduction_code: this.detailData.dealer_introduction_code,
          trading_memo: this.detailData.trading_memo,
          seller_introduction_code: this.detailData.seller_introduction_code,
          buyer_introduction_code: this.detailData.buyer_introduction_code
        })
        .then(res => {
          this.submitting = false
          this.$emit("getNewData")
          this.$notify({
            type: "success",
            title: res.data.message
          })
        })
        .catch(err => {
          this.submitting = false
          console.log(err.response)
        })
    }
  }
}
</script>