<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">顧客管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
                
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-card class="mt-5 form-data wrapper-content" flat tile="">

                <v-card-actions class="pa-4">
                    <v-subheader class="font-weight-bold">編集</v-subheader>
                </v-card-actions>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>顧客ID</span> 
                                        </p>
                                        <v-text-field outlined dense
                                            ref="id_view"
                                            v-model="id_view"
                                            data-vv-name="id_view"
                                            readonly="" filled
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col v-if="withdrawal_date_view" class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>退会日時</span> 
                                        </p>
                                        <v-text-field outlined dense
                                            ref="withdrawal_date_view"
                                            v-model="withdrawal_date_view"
                                            data-vv-name="withdrawal_date_view"
                                            readonly="" filled
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

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="8">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
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
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>郵便番号</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="zipcode"
                                            v-model="zipcode"
                                            data-vv-name="zipcode"
                                            required
                                            :error-messages="errors.zipcode ? errors.zipcode[0] : ''"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>都道府県</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-select outlined dense
                                            v-model="prefecture_id"
                                            :items="selectItems"
                                            item-text="text"
                                            item-value="value"
                                            required
                                            :error-messages="errors.prefecture_id ? errors.prefecture_id[0] : ''"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row pt-3">
                            <v-col class="pb-0 row-padding" cols="12" md="12">
                                <p class="mb-0">
                                    <span>住所</span>
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-text-field outlined dense
                                    ref="address"
                                    type="address"
                                    v-model="address"
                                    data-vv-name="address"
                                    required
                                    :error-messages="errors.address ? errors.address[0] : ''"
                                ></v-text-field>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>携帯電話番号</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-text-field outlined dense
                                            ref="mobile_phone_number"
                                            v-model="mobile_phone_number"
                                            data-vv-name="mobile_phone_number"
                                            required
                                            :error-messages="errors.mobile_phone_number ? errors.mobile_phone_number[0] : ''"
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
                                            <span>固定電話番号</span> 
                                        </p>
                                        <v-text-field outlined dense
                                            ref="fixed_phone_number"
                                            v-model="fixed_phone_number"
                                            data-vv-name="fixed_phone_number"
                                            required
                                            :error-messages="errors.fixed_phone_number ? errors.fixed_phone_number[0] : ''"
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
                                            <span>生年月日</span> 
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-menu
                                            v-model="popupPicker"
                                            :close-on-content-click="false"
                                            :nudge-right="40"
                                            transition="scale-transition"
                                            offset-y
                                            min-width="290px"
                                        >
                                            <template v-slot:activator="{ on }">
                                                <v-text-field outlined dense
                                                    clearable
                                                    @click:clear="birthdate=null"
                                                    v-model="birthdate"
                                                    readonly v-on="on"
                                                    class="border-important"
                                                    :error-messages="errors.birthdate ? errors.birthdate[0] : ''"
                                                ></v-text-field>
                                            </template>
                                            <v-date-picker v-model="birthdate"
                                                :first-day-of-week="0" locale="ja-jp" 
                                                :reactive="reactive"
                                                @change="getDate" 
                                                @input="popupPicker=false" no-title></v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn @click="back">戻る</v-btn>
                    <v-btn color="error" @click="deleteUser">削除</v-btn>
                    <v-btn color="primary" @click="submit">保存</v-btn>
                </v-card-actions>

            </v-card> 
        </v-form>

        <common-delete-modal 
            :dialog="dialogDelete"
            :url="deleteUrl"
            @closeModal="closeModal"
            @reloadList="back"
            ></common-delete-modal>

    </v-container>
</template>

<script>
import Util from '@/util';
import CommonDeleteModal from '@/components/modals/common/delete'

export default {
    name: 'app-member-update',
    components: {
        CommonDeleteModal,
    },
    data() {
        return {
            dialogDelete: false,
            deleteUrl: '',
            reactive: true,
            selectDate: null,
            popupPicker: false,
            valid: true,
            error: '',
            id: null,
            id_view: null,
            withdrawal_date_view: null,
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
            breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: '顧客管理',
                    href: '/member',
                },
                {
                    text: '編集',
                    href: '',
                }
            ],
            selectItems: [
                { value: '', text: '----' },
            ],
            query: null,
            withdrawal_date: null
        };
    },

    watch: {},

    mounted() {
        if(this.$route.params.id) this.id = this.$route.params.id
        this.query = this.$route.query
        this.init()
    },

    methods: {
        getDate() {            
            this.selectDate = this.birthdate
        },
        
        init () {
            try {
                let url = `member/${this.id}`;
                this.$axios.get(url)
                    .then((res) => {
                        if (res.status === 200) { 
                            let result = res.data.data
                            if(result.prefectures) {
                                let prefectures = result.prefectures
                                for (let i = 0; i < prefectures.length; i++) {
                                    this.selectItems.push({ value: prefectures[i].id, text: prefectures[i].name })
                                }
                            }
                            if(result.user) {
                                let customer = result.user
                                this.id = customer.id
                                this.id_view = Util.paddy(customer.id, 8, customer.type)
                                this.withdrawal_date_view = customer.withdrawaldate_ymdhi
                                this.last_name = customer.last_name
                                this.first_name = customer.first_name
                                this.last_name_kana = customer.last_name_kana
                                this.first_name_kana = customer.first_name_kana
                                this.email = customer.email
                                this.zipcode = customer.zipcode
                                this.prefecture_id = customer.prefecture_id
                                this.address = customer.address
                                this.mobile_phone_number = customer.mobile_phone_number
                                this.fixed_phone_number = customer.fixed_phone_number
                                this.birthdate = customer.birthdate
                                this.withdrawal_date = customer.withdrawaldate_ymdhi
                            }
                        }
                    })
            } catch (e) {
                this.error = e.message
            } 
        },

        submit () {            
            if(this.$refs.form.validate()) {
                this.save()
            }
        },

        save () {
            try {
                let url = `member/save`;
                this.$axios.post(url, {
                    id: this.id,
                    last_name: this.last_name,
                    first_name: this.first_name,
                    last_name_kana: this.last_name_kana,
                    first_name_kana: this.first_name_kana,
                    email: this.email,
                    zipcode: this.zipcode,
                    prefecture_id: this.prefecture_id,
                    address: this.address,
                    mobile_phone_number: this.mobile_phone_number,
                    fixed_phone_number: this.fixed_phone_number,
                    birthdate: this.birthdate,
                })
                .then((res) => {
                    if (res.status === 200) { 
                        if(res.data) {
                            this.$notify({
                                type: 'success',
                                title: this.$t('common.success')
                            });
                            this.$router.push({path: '/member?', query: this.query})
                        }
                    }
                })
            } catch (e) {
                this.error = e.message
            }
        },
        
        back () {
            this.$router.push({path: '/member?', query: this.query})
        }, 

        deleteUser() {
            let ids = [0]
            this.deleteUrl = 'member/delete?ids=' + this.id
            this.dialogDelete = true
        }, 

        closeModal() {
            this.dialogDelete = false
        },
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
                zipcode: this.zipcode,
                prefecture_id: this.prefecture_id,
                address: this.address,
                mobile_phone_number: this.mobile_phone_number,
                fixed_phone_number: this.fixed_phone_number,
                birthdate: this.birthdate,
            }
        },
    },
} 
</script>

<style scoped>

</style>