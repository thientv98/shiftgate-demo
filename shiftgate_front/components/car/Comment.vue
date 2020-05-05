<template>
    <div class="comment">
        <div class="comment-panel px-3 py-4">
            <div class="comment-title text-center text-blue font-weight-bold pb-3 border-bottom-gray">
                売り主コメント
            </div>
            <div class="pt-3 text-gray" v-html="carDetail&&carDetail.seller_comment ? carDetail.seller_comment.replace(/(?:\r\n|\r|\n)/g, '<br />') : ''"></div>
        </div>
        <div class="text-center pt-3">
            <v-row v-if="type=='estimate'||type=='selling-car'" dense align="center" justify="center">
                <v-col lg="6" md="6" sm="12" cols="12">
                    <!-- login -->
                    <v-btn v-if="isLogin" @click="favorite(carDetail.id)" class="mt-2 favorite-btn" elevation="0" color="#5b5b5b lighten-2" style="color:#5b5b5b" outlined>
                        <span v-if="carFavorite!=null">
                            <b class="">お気入りに登録</b>
                            <v-icon right color="orange">fas fa-star</v-icon>
                        </span>
                        <span v-if="carFavorite==null">
                            <b class="">お気入りに登録済</b>
                            <v-icon right color="gray">far fa-star</v-icon>
                        </span>
                    </v-btn>
                </v-col>
            </v-row>
            <v-row v-else-if="type=='search'&&isAccess" dense align="center" justify="center">
                <v-col lg="6" md="6" sm="12" cols="12">
                    <!-- login -->
                    <v-btn v-if="isLogin" @click="favorite(carDetail.id)" class="mt-2 favorite-btn" elevation="0" color="#5b5b5b lighten-2" style="color:#5b5b5b" outlined>
                        <span v-if="carFavorite!=null">
                            <b class="">お気入りに登録</b>
                            <v-icon right color="orange">fas fa-star</v-icon>
                        </span>
                        <span v-if="carFavorite==null">
                            <b class="">お気入りに登録済</b>
                            <v-icon right color="gray">far fa-star</v-icon>
                        </span>
                    </v-btn>
                </v-col>
            </v-row>
            <v-row v-else dense align="center" justify="center">
                <v-col lg="6" md="6" sm="12" cols="12">
                    <!-- login -->
                    <v-btn v-if="isLogin" @click="favorite(carDetail.id)" class="mt-2 favorite-btn" elevation="0" color="#5b5b5b lighten-2" style="color:#5b5b5b" outlined>
                        <span v-if="carFavorite!=null">
                            <b class="">お気入りに登録済</b>
                            <v-icon right color="orange">fas fa-star</v-icon>
                        </span>
                        <span v-if="carFavorite==null">
                            <b class="">お気入りに登録</b>
                            <v-icon right color="gray">far fa-star</v-icon>
                        </span>
                    </v-btn>
                    <!-- not login -->
                    <v-btn v-else class="mt-2 favorite-btn" elevation="0" color="#5b5b5b lighten-2" @click="saveStateWhenLogin('favorite')" style="color:#5b5b5b; height: 60px !important;" outlined>
                        <b class="">ログインをしてから <br>お気入りに登録 </b>
                    </v-btn>
                </v-col>
                <v-col v-if="carDetail.is_in_transaction!=1" lg="6" md="6" sm="12" cols="12">
                    <!-- login -->
                    <v-btn v-if="isLogin" depressed  color="#375c7f" class="mt-2 quote-btn" @click.stop="dialog = true" > 
                        <b>お見積り依頼</b>
                    </v-btn>
                    <!-- not login -->
                    <v-btn v-else depressed color="#375c7f" class="mt-2 quote-btn" @click="saveStateWhenLogin('estimate')" style="height: 60px !important;" > 
                        <b>ログインをしてから<br>お見積り依頼</b>
                    </v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" class="text-left pt-0">
                    <p class="mb-0 pa-3 pl-0 line-height-23">・別途、SHIFTGATEサービス利用料、また希望に応じて登録手続き代行料、輸送料、オプション利用料等が必要となります。</p>
                </v-col>
            </v-row>
        </div>
        <RequestEstimate :dialog="dialog" :carDetail="carDetailRevert" @bindingData="bindingData" />
    </div>
</template>

<script>
import axios from 'axios'
import RequestEstimate from '~/components/car/RequestEstimate.vue'

export default {
    name: 'car-comment',
    components: {
        RequestEstimate
    },
    props: ['carDetail', 'carFavorite', 'isLogin', 'type'],
    data() {
        return {
            dialog: false,
        }
    },
    created() {
        if(this.user && this.$store.state.search.revertParamFromState) {
            if(this.$store.state.search.actionsDetail == 'favorite') {
                this.favorite(this.$store.state.search.carDetail.id);
            }
            if(this.$store.state.search.actionsDetail == 'estimate') {
                this.dialog = true
            }
        }
    },
    methods: {
        bindingData(dialog) {
            this.dialog = dialog
            this.$emit('reloadData');
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
        saveStateWhenLogin(action) {
            this.$store.commit('search/revertParamFromState', true)
            this.$store.commit('search/updateActionsDetail', action)
            this.$store.commit('search/saveCarDetail', this.carDetail)
            this.linkToUrl('/login?revertstate=1')
        },
        linkToUrl(url) {
            this.$router.push(url);
        },
    },

    computed: {
        isAccess(){
            if(this.user && (this.user.id == this.carDetail.buyer_id || this.user.id == this.carDetail.customer_id)) {
                return true
            } else {
                return false
            }
        },
        carDetailRevert() {
            return this.$store.state.search.carDetail ? this.$store.state.search.carDetail : this.carDetail
        }
    },
} 
</script>

<style>
    
</style>
