<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">お問い合わせ</div>
            <div class="list-line"></div>
        </v-row>

        <div class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="pt-7 form-confirm-register" align="center" justify="center">
                <v-form class="pa-3 pt-0" ref="form" v-model="valid" lazy-validation>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title">お問い合わせ種類</label>
                        </v-col>
                        <v-col lg="5" md="5" sm="8" cols="12" class="pb-0 pt-1">
                            <v-select dense outlined
                                ref="type" 
                                data-vv-name="type"
                                :error-messages="errors.type ? errors.type[0] : ''"
                                v-model="type" 
                                :items="item"
                                item-text="name"
                                item-value="value"
                            ></v-select>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title">メールアドレス</label>
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
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title">お問い合わせ内容</label>
                        </v-col>
                        <v-col lg="9" md="9" sm="8" cols="12" class="pb-0 pt-1">
                            <v-textarea outlined no-resize
                                ref="messages" 
                                data-vv-name="messages"
                                :error-messages="errors.messages ? errors.messages[0] : ''"
                                v-model="messages"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                    <v-row align="center" justify="center" class="pa-2 pt-0">
                        <v-checkbox 
                                ref="cheked"
                                data-vv-name="checked"
                                v-model="checked">
                            <div slot='label' class="checkbox-slot pt-1">
                                <nuxt-link to="/terms">利用規約 </nuxt-link>と
                                <nuxt-link to="/privacy">個人情報の取り扱いに関する基本方針 </nuxt-link>に同意します。
                            </div>
                        </v-checkbox>
                    </v-row>
                    <v-row class="justify-center align-center mb-5">
                        <v-btn @click="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit" title="送信する" v-show="checked">送信する</v-btn>
                        <v-btn @click="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit" title="送信する" v-show="!checked" disabled>送信する</v-btn>
                    </v-row>
                    <v-row align="center" justify="center" class="pa-2 pt-0 mb-10">
                        <nuxt-link v-if="loggedIn" to="/withdrawal">退会はこちら</nuxt-link>
                    </v-row>
                </v-form>
            </v-row>
        </div>

    </v-container>
</template>

<script>

export default {
    head () {
      return { title: 'お問い合わせ' }
    },
    name: 'contact',
    data () {
        return {
            loggedIn: false,
            valid: true,
            loading_button: false,
            error: '',
            email: "",
            messages: "",
            checked: false,
            type: '',
            item:[
                { name: '---', value: '' }
            ]
        }
    },
    mounted () {
        this.$nextTick(() => {
            this.$nuxt.$loading.start()

            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })
    },
    created() {
        this.getType()
        this.loggedIn = this.$store.state.auth.loggedIn;
        if(this.$store.state.auth.loggedIn){
            this.email = this.$store.state.auth.user.email
        }
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
                let url = `contact`;
                this.$axios.post(url, {
                    type: this.type,
                    email: this.email,
                    messages: this.messages
                })
                .then((res) => {
                    setTimeout(() => {
                        this.loading_button = false
                    }, 800)
                    if (res.status) { 
                        this.$router.push({path: '/contact/done'})
                    }
                }).catch(err => {
                    this.loading_button = false
                    console.log(err.message)
                })
            } catch (e) {
                this.loading_button = false
                this.error = e.message
            }
        },
        getType () {
            try {
                let url = `contact`;
                this.$axios.get(url, {
                })
                .then((res) => {
                    if (res.status) { 
                        this.item = [];
                        this.item = res.data.data.contact_type
                        this.type = 1;
                    }
                })
            } catch (e) {
                this.error = e.message
            }
        }
    },
    computed: {
        form () {
            return {
                type: this.type,
                email: this.email,
                messages: this.messages,
                checked: this.checked
            }
        },
    },
}
</script>