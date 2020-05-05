<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">退会</div>
            <div class="list-line"></div>
        </v-row>

        <div class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="form-confirm-withdrawal" align="center" justify="center">
                <v-form class="pa-3 pt-0" ref="form" v-model="valid" lazy-validation>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title">退会理由</label>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="12" md="12" sm="12" cols="12" class="pb-0 pt-3">
                            <v-radio-group v-model="selected" class="remove-checkedbox-v-message" :rules="[v => !!v]">
                                <v-radio :value="item.text" v-for="item in option" :key="item.id"  >
                                    <div slot='label' style="color: #424242">
                                    {{item.text}}
                                    </div>
                                </v-radio>
                            </v-radio-group>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="12" md="12" sm="12" cols="12" class="pb-0 pt-1 pl-10">
                            <v-textarea outlined no-resize v-model="messages" class="remove-text-field__details"></v-textarea>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="12" md="12" sm="12" cols="12" class="pb-0 pt-1">
                            <v-checkbox 
                                ref="cheked"
                                data-vv-name="checked"
                                v-model="checked"
                                :rules="[v => !!v]">
                                <div slot='label' class="checkbox-slot pt-1">
                                    一度退会を致しますと、ご登録いただいたメールアドレスは使用出来なくなります事を同意致します。
                                </div>
                            </v-checkbox>
                        </v-col>
                    </v-row>
                    <v-row class="justify-center align-center mb-5">
                        <v-btn @click="validate" :loading="loading_button" class="effect effect-1 ma-2 login-submit" 
                        title="送信する" :disabled="!checked || !valid">送信する</v-btn>
                    </v-row>
                </v-form>
            </v-row>
        </div>
    </v-container>
</template>

<script>

export default {
    head () {
      return { title: '退会' }
    },
    name: 'withdrawal',
    data () {
        return {
            option: [
                {
                    id: 1, text: '個人間売買が済んだから退会を希望する'
                },
                {
                    id: 2, text: '個人間売買に興味が薄れたから退会を希望する'
                },
                {
                    id: 3, text: 'サービスに満足できなかったから退会を希望する'
                },
                {
                    id: 4, text: 'その他'
                }
            ],
            valid: true,
            loading_button: false,
            selected: "",
            checked: false,
            messages: ""
        }
    },
    mounted () {
        this.$nextTick(() => {
            this.$nuxt.$loading.start()

            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })
    },
    created() {
    },
    methods: {
        validate () {
            if (this.$refs.form.validate() && this.option) {
                this.loading_button = true
                this.submit();
            }
        },
        submit () {      
            if (this.$refs.form.validate()) {
            let url = `withdrawal`;
            this.$axios.post(url, {
                    option: this.selected,
                    messages: this.messages
                })
                .then(async (res) => {
                    setTimeout(() => {
                        this.loading_button = false
                    }, 800)
                    if (res.status) {
                        let promise = new Promise((resolve, reject) => {
                            resolve(this.$auth.logout());
                        });
                        await promise;
                        this.$router.push({path: '/withdrawal/done'})
                    }
                })
                .catch(err => {
                    this.loading_button = false
                    console.log(err.message)
                })
            }
        }
    },
    computed: {
    },
}
</script>