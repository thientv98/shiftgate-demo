<template>
    <v-card class="form-data sh-toggle wrapper-content" ref="form" flat tile="">
               
        <v-card-actions class="pa-4">
            <v-subheader>検索項目</v-subheader>
            <v-spacer></v-spacer>
            <v-btn class="toggle-icon" icon @click="show = !show">
                <v-icon>{{ show ? 'mdi-minus' : 'mdi-plus' }}</v-icon>
            </v-btn>
        </v-card-actions>

        <v-expand-transition>
            <div v-show="show">
                <v-divider></v-divider>

                <v-card-text>
                    <v-container>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">メーカー</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-select
                                            @change="onChangeMaker"
                                            label=""
                                            outlined
                                            dense
                                            :items="makers"
                                            item-value="value" item-text="name"
                                            ref="formSearch.maker_name"
                                            v-model="formSearch.maker_name"
                                            data-vv-name="formSearch.maker_name"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">車種</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-select
                                            label=""
                                            outlined
                                            dense
                                            :items="addOptionAllToSelect(getModelsFilterData(formSearch.maker_name))"
                                            item-value="value" item-text="name"
                                            ref="formSearch.car_name"
                                            v-model="formSearch.car_name"
                                            data-vv-name="formSearch.car_name"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">年式</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            type="number"
                                            ref="formSearch.model_year"
                                            v-model="formSearch.model_year"
                                            data-vv-name="formSearch.model_year"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">走行距離</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <v-text-field outlined dense
                                                    type="number"
                                                    ref="formSearch.mileage_from"
                                                    v-model="formSearch.mileage_from"
                                                    data-vv-name="formSearch.mileage_from"
                                                ></v-text-field>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <v-text-field outlined dense
                                                    type="number"
                                                    ref="formSearch.mileage_to"
                                                    v-model="formSearch.mileage_to"
                                                    data-vv-name="formSearch.mileage_to"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">売り主種類</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="7">
                                        <v-select
                                            label=""
                                            outlined
                                            dense
                                            :items="customer_type"
                                            item-value="value" item-text="text"
                                            ref="formSearch.customer_type"
                                            v-model="formSearch.customer_type"
                                            data-vv-name="formSearch.customer_type"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">掲載日</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_pdf"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            v-model="formSearch.published_date_from"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="formSearch.published_date_from"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_cf"
                                                        @input="popup_pdf=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_pdt"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            v-model="formSearch.published_date_to"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="formSearch.published_date_to"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_ct"
                                                        @input="popup_pdt=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>    

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">公開</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="7">
                                        <v-select
                                            label=""
                                            outlined
                                            dense
                                            :items="status_code"
                                            item-value="code" item-text="name"
                                            ref="formSearch.public_status_code"
                                            v-model="formSearch.public_status_code"
                                            data-vv-name="formSearch.public_status_code"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">取引状況</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="7">
                                        <v-select
                                            label=""
                                            outlined
                                            dense
                                            :items="status_code_static"
                                            item-value="value" item-text="text"
                                            ref="formSearch.status_code"
                                            v-model="formSearch.status_code"
                                            data-vv-name="formSearch.status_code"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">取引No</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="7">
                                        <v-text-field outlined dense
                                            type="text"
                                            ref="formSearch.trading_no"
                                            v-model="formSearch.trading_no"
                                            data-vv-name="formSearch.trading_no"
                                            :rules="[v => v.length <= 255 || '※最大255文字']"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>    
                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn class="" color="primary" @click="submitSearch">検索</v-btn>
                </v-card-actions>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
import Util from '@/util';
import { commonMethod } from '@/plugins/mixins/common.js' 

export default {
    name: 'trade-search',
    mixins: [commonMethod],
    props: [    
        "makers",
        "status_code",
        "models"
    ],
    data () {
       return {
            reactive_cf: true,
            reactive_ct: true,
            popup_pdf: false,
            popup_pdt: false,
            customer_type: [
                {
                    text: "---",
                    value: ""
                },
                {
                    text: "顧客",
                    value: "C"
                },
                {
                    text: "ディーラー",
                    value: "D"
                }
            ],
            modelsFilter: [],
            formSearch: {
                maker_name: '',
                car_name: '',
                model_year: '',
                mileage_from: '',
                mileage_to: '',
                customer_type: '',
                published_date_from: '',
                published_date_to: '',
                public_status_code: '',
                status_code: '',
                trading_no: ''
            },
            show: false,
            status_code_static: [
                {
                    text: "---",
                    value: ""
                },
                {
                    text: "見積/取引",
                    value: 101
                },
                {
                    text: "成約/契約",
                    value: 201
                },
                {
                    text: "陸送/登録",
                    value: 301
                },
                {
                    text: "取引完了",
                    value: 901
                }
            ],
       }
    },
    computed: {
        allModels() {
            return this.models
        }
    },
    methods: {
        submitSearch () {
            if(this.formSearch.trading_no.length > 255) return;

            if(this.formSearch.published_date_from == null) {
                this.formSearch.published_date_from = ''
            } 
            if(this.formSearch.published_date_to == null) {
                this.formSearch.published_date_to = ''
            }
            this.$parent.submitSearch(this.formSearch);
        }, 
        toggleSearch() {
            Util.toggleSearch();
        },
        onChangeMaker(){
            let maker_name = this.formSearch.maker_name
            this.formSearch.car_name = ''
            this.modelsFilter = this.addOptionAllToSelect(this.allModels.filter(function (item) {
                return item.name.indexOf(maker_name) != -1;
            }));
        },
        getModelsFilterData(maker_name) {
            if(maker_name) {
                return this.modelsFilter
            } else {
                return this.allModels
            }
        },
    }
}
</script>

<style scoped>
.v-content .form-data .item-row .v-subheader{
    font-size: 0.875rem;
    color: rgba(0, 0, 0, 0.54);
}
.toggle-icon{
    height: 36px !important;
    border-radius: 50% !important;
}
</style>