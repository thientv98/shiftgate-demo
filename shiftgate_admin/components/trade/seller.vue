<template>
    <v-card flat>
      <v-container>
        <v-card-text>
          <v-simple-table dense class="custom-table">
            <template v-slot:default>
                  <thead>
                      <th class="py-0 title-custom" colspan="4">売り主</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td>顧客ID</td>
                          <td><a :href="`/member/${sellerData.id}`" target="_blank">{{formatTypeId(sellerData.type,sellerData.id)}}</a></td>
                      </tr>
                      <tr>
                          <td>氏名</td>
                          <td>{{ sellerName }}</td>
                      </tr>
                      <tr>
                          <td>携帯電話</td>
                          <td>{{sellerData.mobile_phone_number}}</td>
                      </tr>
                      <tr>
                          <td>メールアドレス</td>
                          <td><a :href="`mailto:${sellerData.email}`">{{sellerData.email}}</a></td>
                      </tr>
                      <tr>
                          <td>住所</td>
                          <td>{{sellerData.address}}</td>
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
  name: "seller",
  props: ["sellerData"],
  data() {
    return {}
  },
  methods: {},
  computed: {
    sellerName() {
      return this.sellerData.last_name + " " + this.sellerData.first_name
    }
  }
}
</script>

<style lang="scss" scoped>
  .title-custom {
    background: #7a65a1 !important;
    color: white !important;
    // font-weight: bold;
  }
</style>