<template>
  <v-container fluid class="pt-0 wrapper-content">
    <v-row no-gutters class="wrap-breadcrumbs">
      <span class="title">車両詳細</span>
      <v-spacer></v-spacer>
      <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
    </v-row>
    <v-row>
      <v-col lg="6" md="6" sm="6" class="pt-0">
        <v-card class="mt-5" flat tile>
          <trading-condition @getNewData="getNewData" :tradeDetail="tradeDetail"></trading-condition>
        </v-card>
        <v-card class="mt-5" flat tile>
          <seller :sellerData="sellerData"></seller>
          <buyer :buyerData="buyerData"></buyer>
        </v-card>
        <v-card class="mt-5" flat tile>
          <file-management :tradeFileList="tradeFileList" @reloadList="getTradeDetail"></file-management>
        </v-card>
        <v-card class="mt-5" flat tile>
          <file-image :tradeDetail="tradeDetail"></file-image>
        </v-card>
        <v-card class="mt-5" flat tile>
          <contact-management :contactData="contactData"></contact-management>
          <file-other :tradeFileList="tradeFileList"></file-other>
        </v-card>
      </v-col>
      <v-col lg="6" md="6" sm="6" class="pt-0">
        <v-card class="mt-5" flat tile>
          <publish-car :tradeDetail="tradeDetail"></publish-car>
        </v-card>
        <v-card class="mt-5" flat tile>
          <price :tradeDetail="tradeDetail"></price>
        </v-card>
        <v-card class="mt-5" flat tile>
          <car-image :tradeDetail="tradeDetail"></car-image>
        </v-card>
        <v-card class="mt-5" flat tile>
          <car-info :tradeDetail="tradeDetail"></car-info>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import tradingCondition from "@/components/trade/trading_condition"
import seller from "@/components/trade/seller"
import buyer from "@/components/trade/buyer"
import contactManagement from "@/components/trade/contact_management"
import fileManagement from "@/components/trade/file_management"
import publishCar from "@/components/trade/publish_car"
import price from "@/components/trade/price"
import carImage from "@/components/trade/car_image"
import carInfo from "@/components/trade/car_info"
import fileImage from "@/components/trade/file_image"
import fileOther from "@/components/trade/file_other"

export default {
  components: {
    tradingCondition,
    seller,
    buyer,
    contactManagement,
    fileManagement,
    publishCar,
    price,
    carImage,
    carInfo,
    fileImage,
    fileOther
  },
  data() {
    return {
      tradeDetail: {},
      sellerData: {},
      buyerData: {},
      contactData: {},
      tradeFileList: {},
      breadcrumbs: [
        {
          text: "Home",
          disabled: false,
          href: "/"
        },
        {
          text: "車両一覧",
          href: "/trade"
        },
        {
          text: "車両詳細"
        }
      ]
      
    }
  },
  mounted() {
    this.getTradeDetail()
  },
  methods: {
    getTradeDetail() {
      try {
        this.$axios.get("trade/" + this.$route.params.id).then(res => {
          this.tradeDetail = res.data.data.detail
          this.sellerData = res.data.data.sellerData
          this.buyerData = res.data.data.buyerData
          this.contactData = res.data.data.contactData
          this.tradeFileList = res.data.data.fileList
        })
      } catch (e) {
        console.log(e.message)
      }
    },
    getNewData() {
      this.getTradeDetail()
    }
  }
}
</script>
