<template>
    <v-card class="mt-5 form-data sh-toggle wrapper-content" ref="form" flat tile="">
               
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
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">顧客ID</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.id"
                                            v-model="search.id"
                                            data-vv-name="search.id"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">氏名</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.name"
                                            v-model="search.name"
                                            data-vv-name="search.name"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>

                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">電話番号</v-subheader>
                                    </v-col>
                                    <v-col class="pb-0" cols="12" md="9">
                                        <v-text-field outlined dense
                                            ref="search.phone"
                                            v-model="search.phone"
                                            data-vv-name="search.phone"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>

                            <v-col class="pb-0 row-padding" cols="12" md="6">
                                <v-row>
                                    <v-col class="col-left pb-0 pt-0" cols="12" md="3">
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">生年月日</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_bf"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="birthdate_from=null"
                                                            v-model="search.birthdate_from"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.birthdate_from"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_bf"
                                                        @input="popup_bf=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_bt"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="birthdate_to=null"
                                                            v-model="search.birthdate_to"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.birthdate_to"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_bt"
                                                        @input="popup_bt=false" no-title></v-date-picker>
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
                                        <v-subheader class="float-md-right float-lg-right float-xl-right">登録日</v-subheader>
                                    </v-col>
                                    <v-col class="col-right pb-0" cols="12" md="9">

                                        <v-row style="margin-top: -12px;">
                                            <v-col class="col-left pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_cf"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="created_from=null"
                                                            v-model="search.created_from"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.created_from"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_cf"
                                                        @input="popup_cf=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col> <v-col class="col-left pb-0" cols="12" md="2"><span style="margin-left: 20px;">~</span></v-col>
                                            <v-col class="col-right pb-0" cols="12" md="5">
                                                <v-menu
                                                    v-model="popup_ct"
                                                    :close-on-content-click="false"
                                                    :nudge-right="40"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="150px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field outlined dense
                                                            clearable
                                                            @click:clear="created_to=null"
                                                            v-model="search.created_to"
                                                            readonly v-on="on"
                                                            class="border-important"
                                                        ></v-text-field>
                                                    </template>
                                                    <v-date-picker v-model="search.created_to"
                                                        :first-day-of-week="0" locale="ja-jp" 
                                                        :reactive="reactive_ct"
                                                        @input="popup_ct=false" no-title></v-date-picker>
                                                </v-menu>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>                                
                    </v-container>
                </v-card-text>

                <v-divider></v-divider>
                
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn tile color="primary" @click="submit">検索</v-btn>
                </v-card-actions>
            </div>
        </v-expand-transition>
    </v-card>
</template>

<script>
import Util from '@/util';

export default {
    name: 'member-search',
    props: { 
        params: {
            type: Object,
            required: true,
        },     
    },
    data: () => ({         
        reactive_bf: true,
        reactive_bt: true,
        popup_bf: false,
        popup_bt: false,
        reactive_cf: true,
        reactive_ct: true,
        popup_cf: false,
        popup_ct: false,   
        search: {
            id: '',
            name: '',
            phone: '',
            birthdate_from: '',
            created_from: '',
            birthdate_to: '',
            created_to: '',
        },
        show: false,
    }),
    
    computed: {
    },

    mounted() { 
        this.search = this.params 
    },

    methods: {
        submit () {
            this.$emit('reloadList', this.search);
        }, 

        // toggleSearch() {
        //     Util.toggleSearch();
        // },
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