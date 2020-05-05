<template>
    <v-tab-item value="mypage">
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-card flat color="basil" class="information-tab">
                <v-row class="d-flex">
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-0">
                        <v-row class="pa-2 row-value">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">お客様 ID</label>
                            </v-col>
                            <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                                <span class="value">{{customerId}}</span>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-6">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">連絡先</label>
                            </v-col>
                            <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.fixed_phone_number"
                                                v-model="form.fixed_phone_number"
                                                data-vv-name="form.fixed_phone_number"
                                                required
                                                :error-messages="errors.fixed_phone_number ? errors.fixed_phone_number[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <div class="bottom-line-even"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-1">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">入会日</label>
                            </v-col>
                            <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                                <span class="value">{{ user.created_at | moment("YYYY.MM.DD") }}</span>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-7">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">携帯番号</label>
                            </v-col>
                            <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.mobile_phone_number"
                                                v-model="form.mobile_phone_number"
                                                data-vv-name="form.mobile_phone_number"
                                                required
                                                :error-messages="errors.mobile_phone_number ? errors.mobile_phone_number[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <div class="bottom-line-even"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-2">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">カタカナ</label>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.last_name_kana"
                                                v-model="form.last_name_kana"
                                                data-vv-name="form.last_name_kana"
                                                required
                                                :error-messages="errors.last_name_kana ? errors.last_name_kana[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.first_name_kana"
                                                v-model="form.first_name_kana"
                                                data-vv-name="form.first_name_kana"
                                                required
                                                :error-messages="errors.first_name_kana ? errors.first_name_kana[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-8">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">アドレス</label>
                            </v-col>
                            <v-col md="9" sm="8" cols="8" class="px-0 pb-0 pr-5">
                                <span class="value">{{user.email}}</span>
                            </v-col>
                            <div class="bottom-line-even"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-3">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">氏名</label>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.last_name"
                                                v-model="form.last_name"
                                                data-vv-name="form.last_name"
                                                required
                                                :error-messages="errors.last_name ? errors.last_name[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.first_name"
                                                v-model="form.first_name"
                                                data-vv-name="form.first_name"
                                                required
                                                :error-messages="errors.first_name ? errors.first_name[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-4">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">郵便番号</label>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                                ref="form.zipcode"
                                                v-model="form.zipcode"
                                                data-vv-name="form.zipcode"
                                                required
                                                :error-messages="errors.zipcode ? errors.zipcode[0] : ''"
                                            ></v-text-field>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0 order-xs-5">
                        <v-row class="row-value pa-2">
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0">
                                <label for="" class="name">住所</label>
                            </v-col>
                            <v-col md="3" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-select outlined dense
                                                v-model="form.prefecture_id"
                                                :items="selectItems"
                                                item-text="text"
                                                item-value="value"
                                                required
                                                :error-messages="errors.prefecture_id ? errors.prefecture_id[0] : ''"
                                            ></v-select>
                            </v-col>
                            <v-col md="5" sm="4" cols="4" class="px-0 pb-0 pr-5">
                                <v-text-field outlined dense
                                        ref="form.address"
                                        type="form.address"
                                        v-model="form.address"
                                        data-vv-name="address"
                                        required
                                        :error-messages="errors.address ? errors.address[0] : ''"
                                    ></v-text-field>
                            </v-col>
                            <div class="bottom-line"></div>
                        </v-row>
                    </v-col>
                    <v-col md="6" sm="6" cols="12" class="px-4 py-0">
                    </v-col>
                </v-row>
                
                <v-row class="justify-center align-center mt-12">
                    <v-btn depressed large color="#375c7f" class="change-info-btn px-10" @click="submit">変更する</v-btn>
                </v-row>
            </v-card>
        </v-form>
    </v-tab-item>
</template>

<script>

export default {
    props: ['userDetail'],
    data () {
        return {
            valid: true,
            error: '',
            form: {
                id: null,
                last_name: null,
                first_name: null,
                last_name_kana: null,
                first_name_kana: null,
                email: null,
                zipcode: null,
                prefecture_id: null,
                address: null,
                mobile_phone_number: null,
                fixed_phone_number: null,
                birthdate: null,
            },
            selectItems: [
                { value: '', text: '----' },
            ],
        }
    },

    mounted() {
        this.init()
    },

    methods: {
        init () { 
            try {
                let url = `get-prefecture`;
                this.$axios.get(url)
                    .then((res) => { 
                        if (res.status === 200 && res.data.data) { 
                            let prefectures = res.data.data
                            for (let i = 0; i < prefectures.length; i++) {
                                this.selectItems.push({ value: prefectures[i].id, text: prefectures[i].name })
                            }
                        }
                    })
                this.form = this.userDetail
            } catch (e) {
                this.error = e.message
            } 
        },

        submit () {            
            if(this.$refs.form.validate()) {
                try {
                    let url = `me/save`;
                    this.$axios.post(url, this.form)
                    .then((res) => {
                        if (res.status === 200) { 
                            if(res.data) {
                                this.$router.push({path: '/mypage'})
                            }
                        }
                    })
                } catch (e) {
                    this.error = e.message
                }
            }
        },
    }, 

    computed: {
        customerId (){
            return this.userDetail.type ? this.userDetail.type + String(this.userDetail.id).padStart(8, '0') : ''
        }
    },
}
</script>