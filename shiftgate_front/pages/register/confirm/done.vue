<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">会員情報登録</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-12 pt-7 mt-7">
            <v-row class="text-center py-10 register-done" align="center" justify="center">
                会員情報の登録が完了いたしました。<br>
                ご希望に合ったお車をお探しください。
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '会員情報登録' }
    },
    data () {
        return {}
    },
    mounted () {
    this.$nextTick(() => {
      this.$nuxt.$loading.start()

      setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })
  }
}
</script>