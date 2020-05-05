<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">新規会員登録</div>
            <div class="list-line"></div>
        </v-row>

        <div align="center" justify="center" class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="text-center pa-2 register-title" align="center" justify="center">
                まずは、メールアドレスとパスワードをご登録ください。<br>
                ご登録後に入力されましたメールアドレスに仮登録のメールをお送りします。<br>
                仮登録完了後にお客様のお名前、住所、連絡先等をご登録いただきます。
            </v-row>
            <v-row class="login-form pt-7" align="center" justify="center">
                <v-form class="pa-3 pt-0"
                    ref="form"
                    v-model="valid"
                    lazy-validation
                >
                    <v-row>
                        <v-col lg="3" md="3" sm="3" cols="12" class="text-left pt-3 pb-0">
                            <label for="mail">メールアドレス</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="9" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="" outlined dense
                                ref="email"
                                v-model="email"
                                data-vv-name="email"
                                required
                                :error-messages="errors_msg.email ? errors_msg.email[0] : ''"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row class="mt-md-5 mt-lg-5 mt-sm-5">
                        <v-col lg="3" md="3" sm="3" cols="12" class="text-left pt-3 pb-0">
                            <label for="password">パスワード</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="9" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" type="password" placeholder="半角英数 4 文字以上" outlined dense
                                ref="password"
                                v-model="password"
                                data-vv-name="password"
                                required
                                :error-messages="errors_msg.password ? errors_msg.password[0] : ''"
                            >
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row align="center" justify="center" class="pa-2 pt-0">
                        <v-checkbox ref="cheked" data-vv-name="checked" v-model="checked">
                            <div slot='label' class="checkbox-slot pt-1">
                                <nuxt-link to="/terms">利用規約 </nuxt-link>と
                                <nuxt-link to="/privacy">個人情報の取り扱いに関する基本方針 </nuxt-link>に同意します。
                            </div>
                        </v-checkbox>
                    </v-row>
                    <v-row class="justify-center align-center mb-10">
                        <v-btn @click="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit" 
                            title="会員登録する" v-show="checked">会員登録する</v-btn>
                        <v-btn @click="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit" 
                            title="会員登録する" v-show="!checked" disabled>会員登録する</v-btn>
                    </v-row>
                </v-form>
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '新規会員登録' }
    },
    name: 'register',
    data () {
        return {
            valid: true,
            error: '',
            email: null,
            password: null,
            checked: false,
            loading_button: false,
            errors_msg: []
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
                this.save()

            }
        },

        save () {
            try {
                this.loading_button = true;
                let url = `auth/register`;
                this.$axios.post(url, {
                    email: this.email,
                    password: this.password
                })
                .then((res) => {
                    if (res.status === 200) {
                        setTimeout(() => {
                            this.loading_button = false
                        }, 800)

                        if(res.data.code == 200) {
                            this.errors_msg = []
                            this.$router.push({path: '/register/done'})
                        }
                    }
                }).catch(err => {
                    this.loading_button = false
                    this.errors_msg = err.response.data.data
                })
            } catch (e) {
                this.loading_button = false
                this.error = e.message
                this.errors_msg = err.response.data.data
            }
        }
    },

    computed: {
        form () {
            return {
                email: this.email,
                password: this.password,
            }
        },
    },
}
</script>