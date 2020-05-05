<template>
    <v-dialog :value="dialog" max-width="600px" @input="changeDialog(false)" content-class="modal-request-estimate">
        <v-btn tile large color="#203c58" icon class="close-modal" @click="changeDialog(false)">
            <v-icon>fas fa-times</v-icon>
        </v-btn>
        <v-card class="px-10 py-4 login-panel request-estimate-modal">
            <v-row align="center" justify="center">
            <v-form class="form-request-estimate"
                ref="form"
                v-model="valid"
                lazy-validation
            >
                <v-row align="center" justify="center">
                    <div class="list mb-3">お見積り依頼</div>
                    <div class="list-line mb-3 mr-3 ml-3"></div>
                </v-row>
                <div class="required-before pb-5">
                    は必須です
                </div>
                <div class="title-before font-weight-bold text-size-2 text-blue d-flex required-after">
                    お支払い方法を選択してください 
                </div>
                <v-radio-group v-model="form.payment_methods" :mandatory="false" class="mt-1" dense :rules="[rules.required]">
                    <v-radio label="現金" value="cash" class="mb-0"></v-radio>
                    <v-radio label="オートローン" value="installments" class="mb-0"></v-radio>
                </v-radio-group>
                <div class="title-before font-weight-bold text-size-2 text-blue d-flex">
                    その他
                </div>
                <div class="d-inline-flex mt-3 pl-1 desen-v-text-field__details">
                    <v-text-field outlined dense v-model="form.buyer_introduction_code" 
                    class="w-40 ref_code" :rules="[rules.max]"></v-text-field>
                    <label for="" class="v-label theme--light pl-3 ref_code_text">紹介コード</label>
                    <!-- <span class=""></span> -->
                </div>
                <v-row align="center" justify="center" class="pa-2 pt-0">
                    <v-checkbox ref="cheked" data-vv-name="checked" v-model="checked">
                        <div slot='label' class="checkbox-slot pt-1">
                            <nuxt-link to="/terms" class="text-blue font-weight-bold">利用規約 </nuxt-link>と
                            <nuxt-link to="/privacy" class="text-blue font-weight-bold">個人情報の取り扱いに関する基本方針 </nuxt-link>に同意します。
                        </div>
                    </v-checkbox>
                </v-row>
                <v-row class="justify-center align-center">
                    <v-btn class="effect effect-1 ma-2 login-submit mb-7" title="送信" v-show="checked" :loading="loading" @click="submit">送信</v-btn>
                    <v-btn class="effect effect-1 ma-2 login-submit mb-7" title="送信" v-show="!checked" disabled>送信</v-btn>
                </v-row>
            </v-form>
            </v-row>
        </v-card>
    </v-dialog>
</template>

<script>
import axios from 'axios'

export default {
    props: ['dialog', 'carDetail'],
    data () {
        return {
            checked: false,
            valid: true,
            loading: false,
            form: {
                id: null,
                payment_methods: null,
                is_coating: false,
                is_film: false,
                is_warranty_inheritance: false,
                is_electric_components: false,
                is_shift_gate_warranty: false,
                is_other: false,
                is_in_transaction: null,
                buyer_id: null,
                buyer_introduction_code: null,
            },
            rules: {
                required: (v) => !!v || 'フィールドは必須項目です',
                max: v => (v||'').length <= 255 || 'フィールドは255文字以下にしてください。',
            }, 
        }
    },
    watch: {
        dialog: {
            handler() {
                this.init
            }
        }
    },    
    mounted () {
        this.init
    },
    computed: {
        init () {
            this.checked = false
            this.form.id = this.carDetail.id
            this.form.payment_methods = this.carDetail.payment_methods
            this.form.is_coating = this.carDetail.is_coating ? this.carDetail.is_coating : false
            this.form.is_film = this.carDetail.is_film ? this.carDetail.is_film : false
            this.form.is_warranty_inheritance = this.carDetail.is_warranty_inheritance ? this.carDetail.is_warranty_inheritance : false
            this.form.is_electric_components = this.carDetail.is_electric_components ? this.carDetail.is_electric_components : false
            this.form.is_shift_gate_warranty = this.carDetail.is_shift_gate_warranty ? this.carDetail.is_shift_gate_warranty : false
            this.form.is_other = this.carDetail.is_other ? this.carDetail.is_other : false
        }
    },
    methods: {
        changeDialog (dia) {
            this.$store.commit('search/updateActionsDetail', null)
            this.$emit('bindingData', dia);
        },
        submit () {           
            if(this.$refs.form.validate()) {
                let obj = this.form
                for (var p in obj) {
                    if (this.form[p] == true) {
                        this.form[p] = 1
                    } else if (this.form[p] == false) {
                        this.form[p] = 0
                    }
                }
                this.form.is_in_transaction = 1
                this.form.buyer_id = this.$store.state.auth.user.id
                this.loading = true
                this.$axios.put(`cars/${this.form.id}`, this.form).then(res => {
                    this.checked = false
                    this.$emit('bindingData', false);
                    this.loading = false
                });
            }
        },
    },
}
</script>