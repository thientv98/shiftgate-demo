<template>
     <v-container class="mb-15">
            
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">会員情報登録</div>
            <div class="list-line"></div>
        </v-row>

        <div class="login-panel mx-0 pa-5 pt-7 mt-7">
            <v-row class="pt-7 form-confirm-register" align="center" justify="center">
                <v-form class="pa-3 pt-0" ref="form" v-model="valid" lazy-validation @submit.prevent="submit">
                    <v-row>
                        <v-col md="12" sm="12" cols="12" class="required-before pb-5">
                            は必須です
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title required-after">氏 名
                                <label for="" class="sub-title">（全角）</label>
                            </label>
                        </v-col>
                        <v-col lg="5" md="5" sm="5" cols="7" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="姓" outlined dense
                                ref="last_name"
                                data-vv-name="last_name"
                                :error-messages="errors.last_name ? errors.last_name[0] : ''"
                                v-model="last_name">
                            </v-text-field>
                        </v-col>
                        <v-col lg="4" md="4" sm="3" cols="5" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="名" outlined dense
                                ref="first_name"
                                data-vv-name="first_name"
                                :error-messages="errors.first_name ? errors.first_name[0] : ''"
                                v-model="first_name">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title required-after">フリガナ
                                <label for="" class="sub-title">（全角）</label>
                            </label>
                        </v-col>
                        <v-col lg="5" md="5" sm="5" cols="7" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="セイ" outlined dense
                                ref="last_name_kana"
                                data-vv-name="last_name_kana"
                                :error-messages="errors.last_name_kana ? errors.last_name_kana[0] : ''"
                                v-model="last_name_kana">
                            </v-text-field>
                        </v-col>
                        <v-col lg="4" md="4" sm="3" cols="5" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="メイ" outlined dense
                                ref="first_name_kana"
                                data-vv-name="first_name_kana"
                                :error-messages="errors.first_name_kana ? errors.first_name_kana[0] : ''"
                                v-model="first_name_kana">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title required-after">生年月日
                                <label for="" class="sub-title">（半角）</label>
                            </label>
                        </v-col>
                        <v-col lg="7" md="7" sm="8" cols="12" class="pb-0 pt-1 pb-6" v-show="birthdayShow">
                            <!-- <span>{{new Date() | moment("subtract", "100 Year")}}</span> -->
                            <date-dropdown :default="default_date" v-model="birthdate" class="custom-date-dropzone justify-end"
                                months-names="01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12" :min="min_date" :max="max_date" />
                            <p v-if="errors.birthdate" class="error-message pt-2 mb-0" style="text-align: left !important;">{{ errors.birthdate[0] }}</p>
                        </v-col>
                    </v-row>
                    <v-row class="pb-xs">
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="name" class="m-title required-after">郵便番号
                                <label for="" class="sub-title">（半角）</label>
                            </label>
                        </v-col>
                        <v-col lg="2" md="2" sm="2" cols="3" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="zipcode_prefix"
                                data-vv-name="zipcode_prefix"
                                :error-messages="errors.zipcode_prefix ? errors.zipcode_prefix[0] : (errors.zipcode_total ? ' ' : '')"
                                v-model="zipcode_prefix">
                            </v-text-field>
                        </v-col>
                        <div class="text-center pt-3 remove-xs-text-field__details">-</div>
                        <v-col lg="3" md="3" sm="2" cols="4" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="zipcode_subfix"
                                data-vv-name="zipcode_subfix"
                                :error-messages="errors.zipcode_subfix ? errors.zipcode_subfix[0] : (errors.zipcode_total ? ' ' : '')"
                                v-model="zipcode_subfix">
                            </v-text-field>
                        </v-col>
                        <div class="line-break"></div>
                        <v-col lg="3" md="3" sm="4" cols="1" class="text-left pt-3 pb-0 hidden-xs-only" v-if="errors.zipcode_total">
                        </v-col>
                        <v-col lg="9" md="9" sm="8" cols="11" class="pb-0 pt-1 remove-xs-text-field__details" v-if="errors.zipcode_total">
                            <p class="error-message text-left">{{ errors.zipcode_total[0] }}</p>
                        </v-col>
                        <!-- <v-col lg="3" md="3" sm="3" cols="6" class="pb-0 pt-1">
                            <v-btn depressed color="#084D7D" class="text-white w-100">住所入力</v-btn>
                        </v-col> -->
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="address" class="m-title required-after">住 所
                            </label>
                        </v-col>
                        <v-col lg="3" md="3" sm="2" cols="5" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-select dense outlined
                                v-model="prefecture_id"
                                :items="prefectures"
                                item-text="name"
                                item-value="id"
                                :error-messages="errors.prefecture_id ? errors.prefecture_id[0] : ''">
                            </v-select>
                        </v-col>
                        <v-col lg="6" md="6" sm="6" cols="12" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="" outlined dense 
                                ref="address"
                                data-vv-name="address"
                                :error-messages="errors.address ? errors.address[0] : ''"
                                v-model="address">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="mobile_phone_number" class="m-title">連絡先電話番号
                                <label for="" class="sub-title">（半角）</label>
                            </label>
                        </v-col>
                        <v-col lg="2" md="2" sm="2" cols="3" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="fixed_phone_number_prefix"
                                data-vv-name="fixed_phone_number_prefix"
                                :error-messages="errors.fixed_phone_number_prefix ? errors.fixed_phone_number_prefix[0] : (errors.fixed_phone_number_total ? ' ' : '')"
                                v-model="fixed_phone_number_prefix">
                            </v-text-field>
                        </v-col>
                        <div class="text-center col-xs-0-5 pt-3 remove-xs-text-field__details">-</div>
                        <v-col lg="3" md="3" sm="2" cols="4" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="fixed_phone_number_mid"
                                data-vv-name="fixed_phone_number_mid"
                                :error-messages="errors.fixed_phone_number_mid ? errors.fixed_phone_number_mid[0] : (errors.fixed_phone_number_total ? ' ' : '')"
                                v-model="fixed_phone_number_mid">
                            </v-text-field>
                        </v-col>
                        <div class="text-center col-xs-0-5 pt-3 remove-xs-text-field__details">-</div>
                        <v-col lg="3" md="3" sm="3" cols="4" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="fixed_phone_number_subfix"
                                data-vv-name="fixed_phone_number_subfix"
                                :error-messages="errors.fixed_phone_number_subfix ? errors.fixed_phone_number_subfix[0] : (errors.fixed_phone_number_total ? ' ' : '')"
                                v-model="fixed_phone_number_subfix">
                            </v-text-field>
                        </v-col>
                        <div class="line-break"></div>
                        <v-col lg="3" md="3" sm="4" cols="1" class="text-left pt-3 pb-0 hidden-xs-only" v-if="errors.fixed_phone_number_total">
                        </v-col>
                        <v-col lg="9" md="9" sm="8" cols="11" class="pb-0 pt-1 remove-xs-text-field__details" v-if="errors.fixed_phone_number_total">
                            <p class="error-message text-left">{{ errors.fixed_phone_number_total[0] }}</p>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="3" md="3" sm="4" cols="12" class="text-left pt-3 pb-0">
                            <label for="fixed_phone_number" class="m-title">携帯電話番号
                                <label for="" class="sub-title">（半角）</label>
                            </label>
                        </v-col>
                        <v-col lg="2" md="2" sm="2" cols="3" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="mobile_phone_number_prefix"
                                data-vv-name="mobile_phone_number_prefix"
                                :error-messages="errors.mobile_phone_number_prefix ? errors.mobile_phone_number_prefix[0] : (errors.mobile_phone_number_total ? ' ' : '')"
                                v-model="mobile_phone_number_prefix">
                            </v-text-field>
                        </v-col>
                        <div class="text-center col-xs-0-5 pt-3 remove-xs-text-field__details">-</div>
                        <v-col lg="3" md="3" sm="2" cols="4" class="pb-0 pt-1 remove-xs-text-field__details">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="mobile_phone_number_mid"
                                data-vv-name="mobile_phone_number_mid"
                                :error-messages="errors.mobile_phone_number_mid ? errors.mobile_phone_number_mid[0] : (errors.mobile_phone_number_total ? ' ' : '')"
                                v-model="mobile_phone_number_mid">
                            </v-text-field>
                        </v-col>
                        <div class="text-center col-xs-0-5 pt-3 remove-xs-text-field__details">-</div>
                        <v-col lg="3" md="3" sm="3" cols="4" class="pb-0 pt-1">
                            <v-text-field label="" placeholder="" outlined dense
                                type="number"
                                ref="mobile_phone_number_subfix"
                                data-vv-name="mobile_phone_number_subfix"
                                :error-messages="errors.mobile_phone_number_subfix ? errors.mobile_phone_number_subfix[0] : (errors.mobile_phone_number_total ? ' ' : '')"
                                v-model="mobile_phone_number_subfix">
                            </v-text-field>
                        </v-col>
                        <div class="line-break"></div>
                        <v-col lg="3" md="3" sm="4" cols="1" class="text-left pt-3 pb-0 hidden-xs-only" v-if="errors.mobile_phone_number_total">
                        </v-col>
                        <v-col lg="9" md="9" sm="8" cols="11" class="pb-0 pt-1 remove-xs-text-field__details" v-if="errors.mobile_phone_number_total">
                            <p class="error-message text-left">{{ errors.mobile_phone_number_total[0] }}</p>
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
                    <p v-if="errors_msg" class="error-message">{{ errors_msg }}</p>
                    <v-row class="justify-center align-center mb-10">
                        <v-btn type="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit"
                            title="送信する" v-show="checked">送信する</v-btn>
                        <v-btn type="submit" :loading="loading_button" class="effect effect-1 ma-2 login-submit"
                            title="送信する" v-show="!checked" disabled>送信する</v-btn>
                    </v-row>
                </v-form>
            </v-row>
        </div>

    </v-container>
</template>

<script>
import DateDropdown from '~/node_modules/vue-date-dropdown/src/DateDropdown.vue'
import JQuery from 'jquery'
let $ = JQuery

export default {
    head () {
      return { title: '会員情報登録' }
    },
    components: {
        DateDropdown
	},
    data () {
        return {
            errors_msg: '',
            valid: true,
            last_name: null,
            first_name: null,
            last_name_kana: null,
            first_name_kana: null,
            birthdate: '',
            min_date: '',
            max_date: '',
            default_date: '',
            zipcode_prefix: "",
            zipcode_subfix: "",
            prefecture_id: '',
            address: null,
            mobile_phone_number_prefix: "",
            mobile_phone_number_mid: "",
            mobile_phone_number_subfix: "",
            fixed_phone_number_prefix: "",
            fixed_phone_number_mid: "",
            fixed_phone_number_subfix: "",
            checked: false,
            loading_button: false,
            select: { name: '東京都' },
            prefectures:[
                { value: '', text: '---' }
            ], 
            birthdayShow: false
        }
    },
    mounted () {
        this.$nextTick(() => {
            this.$nuxt.$loading.start()

            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })

        //Fix http://redmine.paxcreation.com/issues/1543
        let elements = []
        $('.custom-date-dropzone div').each(function(){
            elements.push($(this).prop('outerHTML'))
        });
        $('.custom-date-dropzone').html(elements.reverse().join(''));
        $('.date-dropdown-select.year').val(new Date(this.default_date).getFullYear())
        $('.date-dropdown-select.month').val(new Date(this.default_date).getMonth())
        $('.date-dropdown-select.day').val(new Date(this.default_date).getDate())
        this.birthdayShow = true
    },
    created() {
        this.getPrefecture()
        this.min_date = new Date(new Date().setFullYear(new Date().getFullYear() - 100)).getFullYear().toString() // get 100 year ago
        this.max_date = new Date().getFullYear().toString(); // get current year
        this.default_date = new Date(new Date().setFullYear(new Date().getFullYear() - 40)).toISOString().slice(0,10) // get 40 year ago format YYYY-MM-DD
    },
    methods: {
        submit () {            
            if(this.$refs.form.validate()) {
                this.save()
            }
        },

        save () {
            try {
                let year = $('.date-dropdown-select.year').val()
                let month = Number($('.date-dropdown-select.month').val())
                let day = $('.date-dropdown-select.day').val()
                let birthday = year + '-' + (month+1) + '-' + day

                this.loading_button = true;
                let url = `auth/register/confirm`;
                this.$axios.post(url, {
                    key: this.$route.params.key,
                    last_name: this.last_name,
                    first_name: this.first_name,
                    last_name_kana: this.last_name_kana,
                    first_name_kana: this.first_name_kana,
                    zipcode_prefix: this.zipcode_prefix,
                    zipcode_subfix: this.zipcode_subfix,
                    zipcode_total: this.zipcode_prefix + this.zipcode_subfix,
                    prefecture_id: this.prefecture_id,
                    address: this.address,
                    mobile_phone_number_prefix: this.mobile_phone_number_prefix,
                    mobile_phone_number_mid: this.mobile_phone_number_mid,
                    mobile_phone_number_subfix: this.mobile_phone_number_subfix,
                    mobile_phone_number_total: this.mobile_phone_number_prefix + this.mobile_phone_number_mid + this.mobile_phone_number_subfix,
                    fixed_phone_number_prefix: this.fixed_phone_number_prefix,
                    fixed_phone_number_mid: this.fixed_phone_number_mid,
                    fixed_phone_number_subfix: this.fixed_phone_number_subfix,
                    fixed_phone_number_total: this.fixed_phone_number_prefix + this.fixed_phone_number_mid + this.fixed_phone_number_subfix,
                    birthdate: birthday
                })
                .then((res) => {
                    if (res.status === 200) {
                        setTimeout(() => {
                            this.loading_button = false
                        }, 800)
                        if(res.data.code == 200) {
                            this.$router.push({path: '/register/confirm/done'})
                        }
                    }
                }).catch(err => {
                    this.loading_button = false
                    if(err.response.status == 400){
                        this.errors_msg = err.response.data.message
                    }else{
                        this.errors_msg = "";
                    }
                })
            } catch (e) {
                this.loading_button = false
            }
        },
        getPrefecture(){
            try {
                let url = `get-prefecture`;
                this.$axios.get(url, {
                })
                .then((res) => {
                    if (res.data.code == 200) {
                        this.prefectures = res.data.data;
                        this.prefectures.unshift({'id': '', 'name': '---'})
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
                last_name: this.last_name,
                first_name: this.first_name,
                last_name_kana: this.last_name_kana,
                first_name_kana: this.first_name_kana,
                zipcode_prefix: this.zipcode_prefix,
                zipcode_subfix: this.zipcode_subfix,
                prefecture_id: this.prefecture_id,
                address: this.address,
                mobile_phone_number_prefix: this.mobile_phone_number_prefix,
                mobile_phone_number_mid: this.mobile_phone_number_mid,
                mobile_phone_number_subfix: this.mobile_phone_number_subfix,
                fixed_phone_number_prefix: this.fixed_phone_number_prefix,
                fixed_phone_number_mid: this.fixed_phone_number_mid,
                fixed_phone_number_subfix: this.fixed_phone_number_subfix,
                birthdate: this.birthdate
            }
        },
    },
}
</script>