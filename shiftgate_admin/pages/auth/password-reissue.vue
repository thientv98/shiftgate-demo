<template>
    <v-app id="login">
        <notifications/>
        <v-content class="v-content-login">
            <v-container fluid fill-height>
                <v-row justify="center">
                    <v-col cols="12" xs="12" sm="8" md="4">
                        <form @submit.prevent="forgotPassword" autocomplete="off">
                            
                            <v-card class="mx-auto wrapper-content">
                                <v-progress-linear
                                    :active="loading"
                                    :indeterminate="loading"
                                    absolute
                                    bottom
                                ></v-progress-linear>
                                <v-card-title>パスワード再発行</v-card-title>
                                <v-card-text>
                                    <span>パスワードを再発行します。<br>入力したメールアドレスにパスワード再設定URLの記述されたメールが届きます</span>
                                </v-card-text>
                                
                                <v-card-text>
                                    <v-row>
                                        <v-col cols="3">
                                            <v-subheader>メールアドレス</v-subheader>
                                        </v-col>
                                        <v-col cols="9">
                                            <v-text-field 
                                                outlined dense autocomplete="off" 
                                                append-icon="mdi-account" 
                                                name="email"
                                                v-model="email" 
                                                type="email"
                                                :rules="[rules.required, rules.length_255]"
                                                :error-messages="errorMes ? errorMes : ''">
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-card-text>


                                <v-card-actions class="pb-5">
                                    <v-spacer></v-spacer>
                                    <v-btn color="grey" @click="linkToRoute('/auth/login')">ログインページへ</v-btn>
                                    <v-btn type="submit" color="primary pl-10 pr-10" @click="loading = true">送信</v-btn>
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
    auth: 'guest',
    head () {
        return { title: this.$t('login.forgot_password') }
    },
    data () {
        return {
            email: '',
            loading: false,
            rules: {
                required: (v) => !!v || 'フィールドは必須項目です',
                length_255: (v) => !!v && v.length <= 255 || 'フィールドは255文字未満でなければなりません'
            },
            errorMes: null
        }
    },

    methods: {
        async forgotPassword(){
            this.loading = true;
            this.errorMes = null;
            try {
                await this.$axios.post('/password/email', {email: this.email}).then((res) => {
                    this.$notify({
                        type: 'success',
                        title: '指定のメールアドレスに送信しました'
                    });
                });
            } catch (error) {
                console.log(error)
                this.errorMes = "該当のメールアドレスがありません";
            }
            this.loading = false;
        },
        linkToRoute(link){
            this.$router.push(link);
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