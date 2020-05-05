<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">お問い合わせ</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-12 pt-7 mt-7">
            <v-row class="text-center py-10 register-done" align="center" justify="center">
                この度はお問い合わせメールをお送りいただきありがとうございます。<br>
                後ほど、担当者のコンシェルジュよりご連絡をさせていただきます。<br>
                今しばらくお待ちくださいますようよろしくお願い申し上げます。<br>
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    data () {
        return {}
    },
    head () {
      return { title: 'お問い合わせ' }
    },
    mounted () {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()

      setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })
  }
}
</script>