<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">パスワード再設定</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="text-center pa-2 register-title" align="center" justify="center">
                新しいパスワードのご登録をお願いいたします。
            </v-row>
            <v-row class="repassword-form pt-7" align="center" justify="center">
                <v-form class="pa-3 pt-0"  ref="form" v-model="valid" lazy-validation @submit.prevent="submit">
                    <v-row>
                        <v-col lg="4" md="4" sm="5" cols="12" class="text-left pt-3 pb-0">
                            <label for="password">新しいパスワード</label>
                        </v-col>
                        <v-col lg="8" md="8" sm="7" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" type="password" placeholder="半角英数4文字以上" outlined dense
                                ref="password"
                                data-vv-name="password"
                                :error-messages="errors.password ? errors.password[0] : ''"
                                v-model="password"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="4" md="4" sm="5" cols="12" class="text-left pt-3 pb-0">
                            <label for="repassword">新しいパスワード（確認用）</label>
                        </v-col>
                        <v-col lg="8" md="8" sm="7" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" type="password" placeholder="再入力してください" outlined dense
                                ref="re_password"
                                data-vv-name="re_password"
                                :error-messages="errors.re_password ? errors.re_password[0] : ''"
                                v-model="re_password"
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
      return { title: 'パスワード再設定' }
    },
    data () {
        return {
            valid: true,
            error: '',
            password: null,
            re_password: null,
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
                let url = `password/reset`;
                this.$axios.post(url, {
                    password: this.password,
                    re_password: this.re_password,
                    key: this.$route.params.key
                })
                .then((res) => {
                    setTimeout(() => {
                        this.loading_button = false
                    }, 800)
                    if (res.data.code == 200) {
                        this.$router.push({path: '/password/reset/done'})
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
                password: this.password,
                re_password: this.re_password
            }
        },
    },
}
</script>