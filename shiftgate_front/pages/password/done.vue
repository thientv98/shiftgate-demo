<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">パスワードを忘れた方</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-12 pt-7 mt-7">
            <v-row class="text-center py-10 register-done" align="center" justify="center">
                パスワード再設定用リンクを送信しました。<br>
                リンク先のパスワード再設定ページより再度パスワードのご登録をお願いいたします。
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    head () {
      return { title: 'パスワードを忘れた方' }
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