<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">新規会員登録</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-12 pt-7 mt-7">
            <v-row class="text-center py-10 register-done" align="center" justify="center">
                仮登録が完了いたしました。<br>
                現在は、仮登録中です。<br>
                送信されたメールアドレスに記述されているURLから本登録をおこなってください。
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '新規会員登録' }
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