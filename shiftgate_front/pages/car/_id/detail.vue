<template>
    <v-layout>
        <v-container fluid v-if="!page403">
            <v-container>
                <div class="mb-15">

                    <Title :carDetail="carDetail" :carPrefecture="carPrefecture" />
                    <Contract v-if="isAccess" :carDetail="carDetail" :isLogin="isLogin" 
                        :type="type" @reloadData="getCarDetail" />
                    <Slider :carDetail="carDetail" />

                    <v-row>
                        <v-col lg="6" md="6" sm="6" cols="12">
                            <Model :carDetail="carDetail" :carPrefecture="carPrefecture" 
                                :userPrefecture="userPrefecture" :landTransportationFee="landTransportationFee" />
                        </v-col>
                        <v-col lg="6" md="6" sm="6" cols="12">
                            <Comment :carDetail="carDetail" :carFavorite="carFavorite" 
                                :isLogin="isLogin" :type="type" @reloadData="getCarDetail" />
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg="6" md="6" sm="6" cols="12">
                            <Information :carDetail="carDetail" :carInformation="carInformation" />
                        </v-col>
                        <v-col lg="6" md="6" sm="6" cols="12">
                            <Equipment :carDetail="carDetail" />
                        </v-col>
                    </v-row>

                </div>
            </v-container>
            
            <Contact />
        </v-container>
        <Page403 v-else/>
    </v-layout>
</template>

<script>
import Contact from '~/components/home/Contact.vue'
import Title from '~/components/car/Title.vue'
import Contract from '~/components/car/Contract.vue'
import Slider from '~/components/car/Slider.vue'
import Model from '~/components/car/Model.vue'
import Comment from '~/components/car/Comment.vue'
import Information from '~/components/car/Information.vue'
import Equipment from '~/components/car/Equipment.vue'
import Page403 from '~/components/403.vue'

export default {
    name: 'car-detail',
    components: {
        Contact,
        Title,
        Contract,
        Slider,
        Model,
        Comment,
        Information,
        Equipment,
        Page403
    },
    data () {
        return {
            type: null,
            carDetail: {},
            carInformation: {},
            carPrefecture: {},
            carCustomer: {},
            carFavorite: {},
            landTransportationFee: {},
            userPrefecture: {},
            isLogin: false,
            page403: false
        }
    },
    created() {
        this.getCarDetail();
    },
    methods: {
        getCarDetail() {
            this.page403 = false;
            try {
                this.$axios.get("car-detail/" + this.$route.params.id).then(res => {
                    if(res.data.data.car.public_status_code == 201) {
                        this.initData(res.data.data)
                    }
                    else {
                        if(this.isLogin) {
                            if(this.user.id == res.data.data.car.customer_id || (this.user.id == res.data.data.car.buyer_id && res.data.data.car.public_status_code == 301)) {
                                this.initData(res.data.data)
                            }
                            else {
                                this.page403 = true;
                                throw new Error("403 Forbidden")
                            }
                        }
                        else {
                            this.page403 = true;
                            throw new Error("403 Forbidden")
                        }
                    }
                })
            } catch (e) {
                console.log(e.message)
            }
        },
        initData(data) {
            this.carDetail = data.car
            this.carInformation = data.carInfos
            this.carCustomer = data.customer
            this.carPrefecture = data.prefecture
            this.carFavorite = data.carFavorite
            this.userPrefecture = data.userPrefecture
            this.landTransportationFee = data.landTransportationFee
        }
    },
    mounted () {
        this.type = this.$route.query.flag ? this.$route.query.flag : ''
        this.isLogin = this.$store.state.auth.user ? true : false
        this.getCarDetail()
    },
    computed: {
        isAccess(){
            if(this.user && (this.user.id == this.carDetail.buyer_id || this.user.id == this.carDetail.customer_id)) {
                return true
            } else {
                return false
            }
        }
    },
    head () {
      return { title: this.carDetail.car_name }
    },
}
</script>


<style scoped>

</style>