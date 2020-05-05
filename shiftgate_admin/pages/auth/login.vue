<template>
    <v-app id="login">
        <notifications/>
        <v-content class="v-content-login">
            <v-container fluid fill-height>
                <v-row justify="center">
                    <v-col cols="12" xs="12" sm="8" md="4">
                        <form @submit.prevent="login" autocomplete="off">
                            
                            <v-card class="mx-auto wrapper-content">
                                <v-progress-linear
                                    :active="loading"
                                    :indeterminate="loading"
                                    absolute
                                    bottom
                                ></v-progress-linear>
                                <v-card-title>ログイン</v-card-title>
                                <v-card-text >
                                    <v-row>
                                        <v-col cols="3" class="pr-0">
                                            <v-subheader class="pa-0 align-start">メールアドレス</v-subheader>
                                        </v-col>
                                        <v-col cols="9">
                                            <v-text-field 
                                                outlined dense 
                                                autocomplete="off" 
                                                :error-messages="errors.email ? errors.email[0] : ''" 
                                                :class="{ 'is-invalid': errors.email }" 
                                                v-model="form.email" 
                                                append-icon="mdi-account" 
                                                name="login" 
                                                type="text">
                                            </v-text-field>
                                            
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col cols="3" class="pr-0">
                                            <v-subheader class="pa-0 align-start">パスワード</v-subheader>
                                        </v-col>
                                        <v-col cols="9">
                                            <v-text-field 
                                                outlined dense 
                                                autocomplete="new-password" 
                                                :error-messages="errors.password ? errors.password[0] : ''" 
                                                :class="{ 'is-invalid': errors.password }" v-model="form.password" 
                                                append-icon="mdi-lock-question" name="password" 
                                                id="password" 
                                                type="password">
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                    <p v-if="errors.msg" class="error">{{ errors.msg }}</p>
                                </v-card-text>

                                <v-card-actions class="pb-5">
                                    <v-spacer></v-spacer>
                                    <a href="/auth/password-reissue">パスワード再発行</a>
                                    <v-spacer></v-spacer>
                                </v-card-actions>

                                <v-card-actions class="pb-5">
                                    <v-spacer></v-spacer>
                                    <v-btn type="submit" color="primary pl-10 pr-10" @click="loading = true">{{ $t('login.submit') }}</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </form>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
export default {
    layout: 'login',
    head () {
        return { title: this.$t('login.headline') }
    },
    data () {
        return {
            form: {
                email: '',
                password: ''
            },
            loading: false,
        }
    },

    methods: {
        async login(){
            this.loading = true
            try {
                await this.$auth.loginWith('local', { data: this.form })
                this.$router.push({ path: '/trade' })
            } catch (e) {
                this.error = e.response.data.message
                console.log(this.error)
            }
            this.loading = false
        }
    },
}
</script>

<style scoped>
.v-content-login{
    background-image: url("/bg/bg-login.jpg");
    background-size: cover;
}
#login {
    height: 50%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    z-index: 0;
}
.v-application .error{
    background-color: white !important;
    color: #ff5252 !important;
}
</style>