<template>
    <v-card flat>
        <v-container fluid>
            <v-form ref="form">
                <v-card-title class="pt-0 pb-0">合計価格 (税別)</v-card-title>
                <v-card-text>
                <h1 class="mt-2 mb-2"><v-icon>mdi-currency-jpy</v-icon> {{ tradeDetail.total_vehicle_price ? formatPrice(tradeDetail.total_vehicle_price) : 0 }}</h1>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-title class="pb-0 item-row">車両本体価格 (税別)<v-icon class="mt-1 ml-1">mdi-svg</v-icon></v-card-title>
                <v-card-text class="pb-0">
                    <v-row>
                        <v-col sm="4" class="pt-0 pb-0 mb-0">
                            <v-text-field
                                outlined
                                dense
                                v-model="total_price"
                                reverse
                                type="number"
                                :rules="[rules.required, rules.lessThan0]"
                                required
                                min="0"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="px-4">
                    <v-spacer></v-spacer>
                    <v-btn class="toggle-icon"  @click="show = !show" block>
                        <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                    </v-btn>
                </v-card-actions>
                <v-expand-transition>
                    <div v-show="show">
                        <v-divider></v-divider>
                        <v-row>
                            <v-col cols="12" sm="7">
                                <v-card-title class="pt-0 pb-3">オプション (税別)</v-card-title>
                                <v-card-text>
                                    <v-simple-table class="custom-table table-option">
                                        <template>
                                            <tbody>
                                                <tr>
                                                    <td>コーティング</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_coating" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.coating_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>フィルム</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_film" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.film_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>保証継承</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_warranty_inheritance" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.warranty_inheritance_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>電装品</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_electric_components" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.electric_components_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>シフトゲート保証</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_shift_gate_warranty" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.shift_gate_warranty_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>その他</td>
                                                    <td><v-checkbox v-model="tradeDetail.is_other" class="ml-1"></v-checkbox></td>
                                                    <td>
                                                        <v-text-field
                                                            solo
                                                            dense
                                                            v-model="tradeDetail.other_fee"
                                                            type="number"
                                                            min="0"
                                                            reverse
                                                        ></v-text-field>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-card-text>
                            </v-col>
                            <v-col>
                                <v-card-title class="pt-0">輸送量 (税別)</v-card-title>
                                <v-card-text class="pt-0 pb-0">
                                    <v-text-field
                                        outlined
                                        dense
                                        v-model="tradeDetail.transport_fee"
                                        type="number"
                                        min="0"
                                        reverse
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-title class="pt-0 pb-0">取得税 (税別)</v-card-title>
                                <v-card-text>
                                    <v-text-field
                                        outlined
                                        dense
                                        v-model="tradeDetail.acquisition_tax"
                                        type="number"
                                        min="0"
                                        reverse
                                    ></v-text-field>
                                </v-card-text>
                                <v-card-title class="pt-0 pb-0 item-row">支払い方法 <v-icon class="mt-1 ml-1">mdi-svg</v-icon></v-card-title>
                                <v-card-text>
                                    <v-radio-group 
                                        v-model="tradeDetail.payment_methods" row 
                                        :rules="[rules.required]" required class="mt-0">
                                        <v-radio label="現金"  value="cash"></v-radio>
                                        <v-radio label="分割" value="installments"></v-radio>
                                    </v-radio-group>
                                </v-card-text>
                                
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col class="pb-0">
                                <v-card-title class="pt-0 pb-0">売り主コメント</v-card-title>
                                <v-card-text class="pt-0 pb-0">
                                    <v-textarea
                                    outlined
                                    dense
                                    v-model="tradeDetail.seller_comment"
                                    ></v-textarea>
                                </v-card-text>
                            </v-col>
                        </v-row>
                    </div>
                </v-expand-transition>
                <v-row>
                    <v-col :class="show ? 'pt-0 pb-0' : 'pb-0'">
                        <v-card-title class="pt-0 pb-0">
                            <v-spacer></v-spacer>
                            <v-btn color="primary" @click="updatePrice">保存</v-btn>
                        </v-card-title>
                    </v-col>
                </v-row>
            </v-form>
        </v-container>
    </v-card>
</template>

<script>
import axios from 'axios'
import Util from '@/util';

export default {
    name: 'price',
    props: ['tradeDetail'],
    data() {
        return {
            rules: {
                required: (v) => !!v || 'フィールドは必須項目です',
                lessThan0: (v) => !!v && v > 0 || '0以上のフィールド',
            },
            show: false,
        }
    },
    methods: {
        formatPrice(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        async updatePrice(){
            console.log(this.tradeDetail)
            if (this.$refs.form.validate()) {
                try {
                    await this.$axios.put('trade/'+this.tradeDetail.id, this.tradeDetail).then(res => {
                        this.tradeDetail.total_vehicle_price = res.data.data.total_vehicle_price
                        this.$notify({
                            type: 'success',
                            title: res.data.message
                        });
                    })
                } catch (e) {
                    console.log(e)
                    this.$notify({
                        type: 'error',
                        title: e.message
                    });
                }
            }
        }

    },
    computed: {
        total_price: {
            get() {
                return this.tradeDetail.total_price ? this.tradeDetail.total_price : 0
            },
            set(value) {
                this.tradeDetail.total_price = value
            }
        }
    },
} 
</script>

<style>
    .v-card__title .mdi:before{
        font-size: 10px;
        padding-bottom: 5px;
    }
    
    .v-card__actions .v-btn--block.toggle-icon {
        justify-content: flex-end;
    }
</style>