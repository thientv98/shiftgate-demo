<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">コンシェルジュ管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
                
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-card class="mt-5 form-data wrapper-content" flat tile>

                <v-card-actions class="pa-4">
                    <v-subheader class="font-weight-bold">新規登録</v-subheader>
                </v-card-actions>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>氏名(姓)</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="last_name"
                                            v-model="last_name"
                                            data-vv-name="last_name"
                                            required
                                            :error-messages="errors.last_name ? errors.last_name[0] : ''"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>氏名(名)</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="first_name"
                                            v-model="first_name"
                                            data-vv-name="first_name"
                                            required
                                            :error-messages="errors.first_name ? errors.first_name[0] : ''"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>フリガナ(姓)</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="last_name_kana"
                                            v-model="last_name_kana"
                                            data-vv-name="last_name_kana"
                                            required
                                            :error-messages="errors.last_name_kana ? errors.last_name_kana[0] : ''"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>フリガナ(名)</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="first_name_kana"
                                            v-model="first_name_kana"
                                            data-vv-name="first_name_kana"
                                            required
                                            :error-messages="errors.first_name_kana ? errors.first_name_kana[0] : ''"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row pt-3">
                            <v-col class="pb-0 row-padding" cols="12" md="12">
                                <p class="mb-0">
                                    <span>メールアドレス</span> 
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-text-field outlined dense
                                    ref="email"
                                    v-model="email"
                                    data-vv-name="email"
                                    required
                                    :error-messages="errors.email ? errors.email[0] : ''"
                                ></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row class="item-row pt-3">
                            <v-col class="pb-0 row-padding" cols="12" md="8">
                                <p class="mb-0">
                                    <span>ログインパスワード</span>
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-text-field outlined dense
                                    ref="password"
                                    type="password"
                                    v-model="password"
                                    data-vv-name="password"
                                    required
                                    :error-messages="errors.password ? errors.password[0] : ''"
                                ></v-text-field>
                            </v-col>
                        </v-row>

                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn class="ma-2" @click="back">戻る</v-btn>
                    <v-btn color="primary" @click="submit">保存</v-btn>
                </v-card-actions>

            </v-card> 
        </v-form>
    </v-container>
</template>

<script>
export default {
    name: 'app-admin-add',
    data() {
        return {
            valid: true,
            error: '',
            id: null,
            last_name: null,
            first_name: null,
            last_name_kana: null,
            first_name_kana: null,
            email: null,
            password: null,
            breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: 'コンシェルジュ管理',
                    href: '/admin',
                },
                {
                    text: '新規登録',
                    href: '',
                }
            ],
        };
    },

    watch: {},

    mounted() {},

    methods: {
        submit () {            
            if(this.$refs.form.validate()) {
                this.save()
            }
        },

        save () {
            try {
                let url = `user/save`;
                this.$axios.post(url, {
                    id: null,
                    last_name: this.last_name,
                    first_name: this.first_name,
                    last_name_kana: this.last_name_kana,
                    first_name_kana: this.first_name_kana,
                    email: this.email,
                    password: this.password
                })
                .then((res) => {
                    if (res.status === 200) { 
                        if(res.data) {
                            this.$notify({
                                type: 'success',
                                title: this.$t('common.success')
                            });
                            this.$router.push({path: '/admin'})
                        }
                    }
                })
            } catch (e) {
                this.error = e.message
            }
        },
        
        back () {
            this.$router.push({path: '/admin'})
        }
    },

    computed: {
        form () {
            return {
                id: null,
                last_name: this.last_name,
                first_name: this.first_name,
                last_name_kana: this.last_name_kana,
                first_name_kana: this.first_name_kana,
                email: this.email,
                password: this.password,
            }
        },
    },
} 
</script>

<style scoped>

</style>