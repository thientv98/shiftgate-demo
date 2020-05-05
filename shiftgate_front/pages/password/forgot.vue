<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">パスワードを忘れた方 </div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="text-center pa-2 register-title" align="center" justify="center">
                ご登録頂いているメールアドレスにパスワード再設定用のリンクをお送りします。<br>
                リンク先のパスワード再設定ページより再度パスワードのご登録をお願いいたします。
            </v-row>
            <v-row class="forgotpassword-form pt-7" align="center" justify="center">
                <v-form class="pa-3 pt-0" ref="form" v-model="valid" lazy-validation @submit.prevent="submit">
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="email">メールアドレス</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="8" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="" outlined dense
                                ref="email"
                                data-vv-name="email"
                                :error-messages="errors.email ? errors.email[0] : ''"
                                v-model="email"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row class="justify-center align-center mb-10">
                        <v-btn type="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit" title="送信する">送信する</v-btn>
                    </v-row>
                </v-form>
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
        return {
            valid: true,
            error: '',
            email: null,
            loading_button: false,
        }
    },
    mounted () {
        this.$nextTick(() => {
            this.$nuxt.$loading.start()

            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })
    },
    methods: {
        submit () {            
            if(this.$refs.form.validate()) {
                this.loading_button = true
                this.save()
            }
        },

        save () {
            try {
                let url = `password/email`;
                this.$axios.post(url, {
                    email: this.email
                })
                .then((res) => {
                    setTimeout(() => {
                        this.loading_button = false
                    }, 800)
                    if (res.status) { 
                        this.$router.push({path: '/password/done'})
                    }
                }).catch(err => {
                    this.loading_button = false
                    console.log(err.message)
                })
            } catch (e) {
                this.loading_button = false
                this.error = e.message
            }
        }
    },
    computed: {
        form () {
            return {
                email: this.email
            }
        },
    },
}
</script>