<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">ログイン</div>
            <div class="list-line"></div>
        </v-row>
        <div align="center" justify="center" class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row v-if="!isMobile" class="login-form pt-7" align="center" justify="center">
                <v-form class="pa-3 pt-0" @submit.prevent="login" autocomplete="off">
                    <v-row>
                        <v-col lg="3" md="3" sm="3" cols="12" class="text-left pt-3 pb-0">
                            <label for="mail">メールアドレス</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="9" cols="12" class="pb-0 pt-1">
                            <v-text-field 
                                outlined dense 
                                autocomplete="off" 
                                :error-messages="errors.email ? errors.email[0] : ''" 
                                :class="{ 'is-invalid': errors.email }" 
                                v-model="form.email" 
                                name="login" 
                                type="text">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="3" cols="12" class="text-left pt-3 pb-0">
                            <label for="password">パスワード</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="9" cols="12" class="pb-0 pt-1">
                            <v-text-field 
                                outlined dense 
                                autocomplete="new-password" 
                                :error-messages="errors.password ? errors.password[0] : ''" 
                                :class="{ 'is-invalid': errors.password }" v-model="form.password" 
                                name="password" 
                                id="password" 
                                type="password">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <p v-if="errors.msg" class="error-message">{{ errors.msg }}</p>
                    <v-row class="justify-center align-center mb-5">
                        <v-btn type="submit" :loading="loading" color="pl-10 pr-10" class="effect effect-1 ma-2 login-submit" @click="loading = true">ログイン</v-btn>
                    </v-row>
                    <v-row class="justify-center align-center mb-5">
                        <nuxt-link to="/password/forgot">パスワードを忘れた方はこちら</nuxt-link>
                    </v-row>
                    <hr>
                    <v-row class="justify-center align-center mt-5 mb-10">
                        <nuxt-link to="/register">新規登録はこちら</nuxt-link>
                    </v-row>
                </v-form>
            </v-row>
            <div v-if="isMobile">Loading</div>
        </div>

    </v-container>
</template>

<script>
export default {
    head () {
        return { title: 'ログイン' }
    },
    data () {
        return {
            form: {
                email: '',
                password: '',
                device: 'web'
            },
            loading: false,
            isMobile: 0,
        }
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })
    },

    created(){
        this.isMobile = this.$cookies.get('isMobile');

        let token = this.$cookies.get('auth._token.local')
        if(this.isMobile && typeof token == 'string'){
            let cookieFrefer = this.$cookies.get('document_prefer')
            let prefer = (typeof cookieFrefer == 'string') ? cookieFrefer : '/mypage'
            this.$router.push(prefer)
        }
    },
    methods: {
        async login(){
            this.loading = true
            try {
                await this.$auth.loginWith('local',{data: this.form})

                if(this.$route.query.revertstate){
                    this.$router.back()
                }else{
                    this.$router.push('/');
                }
            } catch (e) {
                console.log(e)
            }
            this.loading = false
        }
    },
}
</script>