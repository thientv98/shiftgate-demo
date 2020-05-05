<template>
    <v-card flat>
      <v-container>
          <v-card-text v-if="buyerData">
              <v-simple-table dense class="custom-table">
                <template v-slot:default>
                      <thead>
                          <th class="py-0 title-custom" colspan="4">買い主</th>
                      </thead>
                      <tbody>
                          <tr>
                              <td>顧客ID</td>
                              <td><a :href="`/member/${buyerData.id}`" target="_blank">{{formatTypeId(buyerData.type,buyerData.id)}}</a></td>
                          </tr>
                          <tr>
                              <td>氏名</td>
                              <td>{{ buyerName }}</td>
                          </tr>
                          <tr>
                              <td>携帯電話</td>
                              <td>{{buyerData.mobile_phone_number}}</td>
                          </tr>
                          <tr>
                              <td>メールアドレス</td>
                              <td><a :href="`mailto:${buyerData.email}`">{{buyerData.email}}</a></td>
                          </tr>
                          <tr>
                              <td>住所</td>
                              <td>{{buyerData.address}}</td>
                          </tr>
                      </tbody>
                  </template>
                </v-simple-table>
          </v-card-text>
      </v-container>
    </v-card>
</template>

<script>
import { commonMethod } from "@/plugins/mixins/common.js"

export default {
  mixins: [commonMethod],
  name: "buyer",
  props: ["buyerData"],
  data() {
    return {}
  },
  methods: {},
  computed: {
    buyerName() {
      return this.buyerData.last_name + " " + this.buyerData.first_name
    }
  }
}
</script>

<style lang="scss" scoped>
  .title-custom {
    background: #4B6F65 !important;
    color: white !important;
    // font-weight: bold;
  }
</style>