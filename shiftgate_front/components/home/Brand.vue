<template>
    <div class="branch-section pa-0">
        <v-container>
            <v-row class="branch">
                <v-col class="title-name" sm="12" md="12" lg="12" xs="12" cols="12">BRAND</v-col>
            </v-row>
            <v-row class="d-flex flex-wrap" no-gutters>
                <v-col
                    class="col-md-1-5 text-center logo-item"
                    sm="3"
                    xs="4"
                    cols="4"
                    v-for="(item, i) in branchList"
                    :key="i"
                    :class="[i<number ? 'read-more show' : 'read-more']"
                >
                    <div class="logo-branch pa-2 pl-0">
                        <div @click="goToSearch(item.name)">
                            <img :src="`/images/index/${item.icon_image}`" alt />
                        </div>
                    </div>
                </v-col>
                <v-col class="col-md-1-5 text-center logo-item d-none d-sm-inline" sm="3" xs="4" cols="4" v-if="total > 0">
                    <div class="logo-branch pa-2 pl-0">
                        <div @click="search()">
                            <img src="/images/index/more.png" alt />
                        </div>
                    </div>
                </v-col>
            </v-row>
            <v-row class="justify-center align-center d-sm-none">
                <v-btn class="effect effect-1 ma-2 search-button view-more-arrival" @click="search()" title="もっと見る">もっと見る</v-btn>
            </v-row>
            <v-row class="justify-center align-center" v-show="total > number">
                <v-btn @click="showMore" text color="primary" class="view-more-branch">
                    <span>more</span>
                    <i class="fas fa-chevron-down"></i>
                </v-btn>
            </v-row>
        </v-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
            number: 16,
            total: 0,
            branchList: []
        }
    },
    created() {
        this.getMakerList()
    },
    methods: {
        showMore: function(event) {
            this.number = this.total
        },
        getMakerList() {
            try {
                this.$axios.get("/maker-list")
                .then(res => {
                    this.branchList = res.data.data
                    this.total = this.branchList.length
                })
            } catch (e) {
                console.log(e.message)
            }
        },
        goToSearch(brand) {
            this.$store.commit('search/updateBrandSearch', brand)
            this.$router.push('/search')
        },
        search(){
            this.$router.push('/search')
        }
    }
}
</script>
