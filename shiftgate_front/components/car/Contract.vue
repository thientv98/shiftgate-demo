<template>
    <div class="car-detail-contract my-5">
        <v-row dense>
            <v-col lg="2" md="2" sm="2" cols="12" class="mt-auto mb-auto">
                <v-row dense>
                    <v-col lg="12" md="12" sm="12" cols="3" class="font-weight-bold text-gray py-0">取引 No.</v-col>
                    <v-col lg="12" md="12" sm="12" cols="9" class="font-weight-bold text-size-2 text-blue py-0">{{carDetail ? carDetail.trading_no : ''}}</v-col>
                </v-row>
            </v-col>
            <v-col lg="10" md="10" sm="10" cols="12">
                <v-row dense>
                    <v-col lg="3" md="3" sm="3" cols="6" class="car-status-col">
                       <div  class="car-status first" :class="carDetail.is_in_transaction==0 ? 'background-orange': 'background-blue'">① 見積 / 取引 </div>
                    </v-col>
                    <v-col lg="3" md="3" sm="3" cols="6" class="car-status-col">
                        <div class="car-status" :class="carDetail.is_in_contract==0 ? 'background-orange': 'background-blue'">② 成約 / 契約</div>
                    </v-col>
                    <v-col lg="3" md="3" sm="3" cols="6" class="car-status-col">
                        <div class="car-status" :class="carDetail.is_car_delivery_complete==0 ? 'background-orange': 'background-blue'">③ 陸送 / 登録</div>
                    </v-col>
                    <v-col lg="3" md="3" sm="3" cols="6" class="car-status-col">
                        <div class="car-status last" :class="carDetail.is_trading_complete==0 ? 'background-orange': 'background-blue'">④ 取引完了</div>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>

        <!-- <v-row dense class="mt-4" align="center" justify="center">
            <v-col lg="2" md="2" sm="2" cols="12" class="font-weight-bold text-gray">
                {{ isCustomer ? '売却承諾' : '購入承諾'}}
            </v-col>
            <v-col lg="2" md="3" sm="3" cols="12" class="pl-1 pl-sm-0 pb-2">
                <v-btn :disabled="carDetail.is_in_contract == 0 || isCarConsent ? true : false" 
                    @click.stop="changeCarConsent(carDetail.id, isCustomer ? 'is_seller_consent' : 'is_buyer_consent', 1)" depressed class="text-white w-100" style="max-height:40px; color:white !important" 
                    v-bind:style="{backgroundColor: isCarConsent ? '#014b7c !important' : '#00AA9D !important'}"
                    :loading="consentLoading"> 
                    {{ isCustomer ? '売却承諾' : '購入承諾'}}{{ isCarConsent ? ' 済' : '' }}
                    <v-icon right style="color:white !important">far fa-handshake</v-icon>
                </v-btn>
            </v-col>
            <v-col lg="8" md="7" sm="7" cols="12" class="mt-auto mb-auto pl-xs-0 pl-sm-5 pb-xs-3 pt-0">
                ※取引状況が「成約/契約」の場合に承諾ボタンを押すことができるようになります。
            </v-col>
        </v-row> -->
        <v-row v-if="isBuyer" dense class="mt-4 mb-4">
            <v-col md="6" cols="12" class="contract-child">
                <label for="">御見積</label>
                <div class="border-gray py-4 px-3 contract-child-text">
                    <span v-if="estimate.length == 0 && loadData">御見積り作成中です。おまちください</span>
                    <v-simple-table dense class="custom-table w-100" v-if="estimate.length > 0 && loadData">
                        <template v-slot:default>
                            <thead>
                                <th class="py-0">日時</th>
                                <th class="py-0">ファイル</th>
                            </thead>
                            <tbody>
                                <tr v-for="file in estimate" :key="file.id">
                                    <td>{{ file.created_at | moment("YYYY/MM/DD HH:mm") }}</td>
                                    <td class="text-left"><a href="javascript:void(0)" @click="downloadFile(file)">{{file.image_name}}</a></td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </div>
            </v-col>
            <v-col md="6" cols="12" class="contract-child">
                <label for="">ご契約</label>
                <div class="border-gray py-4 px-3 contract-child-text flex-column">
                    <span v-if="!contract_buyer && loadData">御見積り確定までおまちください</span>
                    <v-simple-table dense class="custom-table w-100 mb-3" v-if="contract_buyer && loadData">
                        <template v-slot:default>
                            <thead>
                                <th class="py-0">日時</th>
                                <th class="py-0">ファイル</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ contract_buyer.updated_at | moment("YYYY/MM/DD HH:mm") }}</td>
                                    <td class="text-left"><a href="javascript:void(0)" @click="downloadFile(contract_buyer)">
                                        {{contract_buyer.image_name}} <span v-if="contract_buyer && contract_buyer.is_signature_contract == 1">(署名済み)</span></a>
                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                    <div class="text-center border-gray w-100 py-4 px-3" v-if="contract_buyer && loadData">
                        <v-btn depressed v-if="contract_buyer" class="w-100 mb-2 btn-signature_contract" :disabled="contract_buyer ? contract_buyer.is_signature_contract == 1 : false" @click.stop="dialog = true">
                            <client-only v-if="contract_buyer && contract_buyer && contract_buyer.is_signature_contract == 1">電子署名済み</client-only>
                            <client-only v-if="contract_buyer && contract_buyer && contract_buyer.is_signature_contract == 0">電子署名する</client-only>
                        </v-btn>
                        <span class="mx-n2" v-if="contract_buyer && contract_buyer.is_signature_contract == 0">※ご契約を確認後、問題なければ「電子署名する」を押し、電子署名してください。</span>
                    </div>
                </div>
            </v-col>
        </v-row>

        <v-row v-if="isCustomer && contract_seller">
            <label for="" class="pl-3">ご契約</label>
            <v-col cols="12" class="contract-child">
                
                <div class="border-gray py-4 px-3 contract-child-text">
                    <v-row dense>
                        <v-col cols="12" md="6">
                            <v-simple-table dense class="custom-table w-100 mb-3" v-if="contract_seller && loadData">
                                <template v-slot:default>
                                    <thead>
                                        <th class="py-0">日時</th>
                                        <th class="py-0">ファイル</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ contract_seller.updated_at | moment("YYYY/MM/DD HH:mm") }}</td>
                                            <td class="text-left"><a href="javascript:void(0)" @click="downloadFile(contract_seller)">
                                                {{contract_seller.image_name}} <span v-if="contract_seller && contract_seller.is_signature_contract == 1">(署名済み)</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-col>
                        <v-col cols="12" md="6">
                            <!-- <div class="text-center border-gray w-100 py-4 px-3" v-if="contract_seller && loadData"> -->
                                <v-btn depressed v-if="contract_seller" class="w-100 mb-2 btn-signature_contract" :disabled="contract_seller ? contract_seller.is_signature_contract == 1 : false" @click.stop="dialog = true">
                                    <client-only v-if="contract_seller && contract_seller.is_signature_contract == 1">電子署名済み</client-only>
                                    <client-only v-if="contract_seller && contract_seller.is_signature_contract == 0">電子署名する</client-only>
                                </v-btn>
                                <span class="mx-0" v-if="contract_seller && contract_seller.is_signature_contract == 0">※ご契約を確認後、問題なければ「電子署名する」を押し、電子署名してください。</span>
                            <!-- </div> -->
                        </v-col>
                    </v-row>
                </div>
            </v-col>
        </v-row>
        
        <!-- <ConfirmSignature :dialog="dialog" :carDetail="carDetail" 
            :user_signature="user_signature" @bindingData="bindingData" /> -->
        
        <ElectronicSignature :dialog="dialog" :carDetail="carDetail" :file="isBuyer ? contract_buyer : contract_seller"
            @bindingData="bindingData" @disableButton='disableButton'/>
    </div>
</template>

<script>
import axios from 'axios'
// import ConfirmSignature from '~/components/car/ConfirmSignature.vue'
import ElectronicSignature from '~/components/car/ElectronicSignature.vue'

export default {
    name: 'car-contract',
    components: {
        // ConfirmSignature,
        ElectronicSignature,
    },
    props: ['carDetail', 'isLogin', 'type'],
    data() {
        return {
            dialog: false,
            userType: null,
            user_signature: null,
            consentLoading: false,
            estimate: [],
            contract_buyer: null,
            contract_seller: null,
            loadData: false,
            disable: false,
        }
    },
    watch: {
        dialog: {
            handler() {
                this.$emit('reloadData')
            }
        },
    },   
    mounted () {
        this.userType = this.$store.state.auth.user ? this.$store.state.auth.user.type : null
    },
    created(){
        this.getCarFile()
    },
    methods: {
        bindingData(dialog) {
            this.dialog = dialog
        },
        disableButton(){
            let id = this.$store.state.auth.user.id   
            if(id == this.carDetail.customer_id) {
                this.contract_seller.is_signature_contract = 1
            }
            if(id == this.carDetail.buyer_id){
                this.contract_buyer.is_signature_contract = 1
            }
        },
        getCarFile(){
            try {
                this.$axios.get('car-file/'+this.carDetail.id).then(res => {
                    this.estimate = res.data.data.estimate
                    this.contract_buyer = res.data.data.contract_buyer
                    this.contract_seller = res.data.data.contract_seller
                    this.loadData = true
                });
            } catch (e) {
                console.log(e)
            }
        },
        favorite(id){
            try {
                this.$axios.post('update-favorite',{idCar: id}).then(res => {
                    this.$emit('reloadData');
                });
            } catch (e) {
                console.log(e)
            }
        },
        changeCarConsent(id, col, val){
            this.consentLoading = true
            try {
                this.$axios.post('update-car-consent',{
                    id: id,
                    col: col,
                    val: val
                }).then(res => {
                    if(res.status){
                        this.consentLoading = false
                        if(col == "is_seller_consent")
                            this.carDetail.is_seller_consent = 1
                        else
                            this.carDetail.is_buyer_consent = 1
                    }
                });
            } catch (e) {
                console.log(e)
            }
        },
        downloadFile(item) {
            let fileName = item.image_path.split("\\").splice(-1,1)
            let name = item.image_name
            const key = btoa(btoa(this.user.email))
            const userData = this.user.email
            window.open(process.env.SERVER_URL +`/file/download/${item.id}/${userData}/${key}`, "_blank")
        }
    },

    computed: {
        isCustomer () {
            let id = this.$store.state.auth.user.id   
            if(id == this.carDetail.customer_id) {
                return true
            } 
            return false
        },
        isBuyer () {
            let id = this.$store.state.auth.user.id                
            if(id == this.carDetail.buyer_id) {
                return true
            } 
            return false
        },
        isCarConsent(){
            let id = this.$store.state.auth.user.id   
            if(id == this.carDetail.customer_id) {
                return this.carDetail.is_seller_consent == 1
            }
            return this.carDetail.is_buyer_consent == 1
        }
    },
} 
</script>