<template>
    <v-app id="login">
        <notifications/>
        <v-content class="v-content-login">
            <v-container fluid fill-height>
                <v-row justify="center">
                    <v-col cols="12" xs="12" sm="8" md="4">
                        <form @submit.prevent="changePassword" autocomplete="off">
                            
                            <v-card class="mx-auto wrapper-content">
                                <v-progress-linear
                                    :active="loading"
                                    :indeterminate="loading"
                                    absolute
                                    bottom
                                ></v-progress-linear>
                                <v-card-title>パスワード再発行</v-card-title>
                                <v-card-text>
                                    <span>新たなパスワードを設定してください</span>
                                </v-card-text>
                                
                                <v-card-text>
                                    <v-row>
                                        <v-col cols="3">
                                            <v-subheader>パスワード</v-subheader>
                                        </v-col>
                                        <v-col cols="9">
                                            <v-text-field 
                                                outlined dense autocomplete="off" 
                                                append-icon="mdi-account" 
                                                name="password" 
                                                v-model="params.password" 
                                                type="password"
                                                :rules="[rules.required, rules.length_255]">
                                            </v-text-field>
                                        </v-col>
                                    </v-row>
                                    <p v-if="errors.msg" class="error">{{ errors.msg }}</p>
                                </v-card-text>


                                <v-card-actions class="pb-5">
                                    <v-spacer></v-spacer>
                                    <v-btn color="grey" @click="linkToRoute('/auth/login')">ログインページへ</v-btn>
                                    <v-btn type="submit" color="primary pl-10 pr-10" @click="loading = true">登録</v-btn>
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
            params: {
                key: '',
                password: '',
            },
            loading: false,
            rules: {
                required: (v) => !!v || 'フィールドは必須項目です',
                length_255: (v) => !!v && v.length <= 255 || 'フィールドは255文字未満でなければなりません'
            },
        }
    },
    async created() {
        if(this.$route.params.key) {
            this.params.key = this.$route.params.key;
        }
        try {
            await this.$axios.post('check-key', this.params).then((res) => {
                console.log(res)
            });
        } catch (error) {
            this.linkToRoute('/auth/login');
        }
    },
    methods: {
        async changePassword(){
            if(this.$route.params.key) {
                this.params.key = this.$route.params.key;
            }
            this.loading = true;
            try {
                await this.$axios.post('/password/reset', this.params).then((res) => {
                    this.$notify({
                        type: 'success',
                        title: 'パスワードを変更しました'
                    });
                });
                this.loading = false;
                setTimeout( () => this.$router.push('/auth/login'), 1700);
            } catch (error) {
                console.log(error)
                // this.$notify({
                //     type: 'error',
                //     title: error.data.message
                // });
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