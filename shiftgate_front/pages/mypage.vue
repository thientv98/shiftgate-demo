<template>
    <v-container class="mb-15">
        <v-row align="center" justify="center" class="ma-0">
            <div class="list mb-3">マイページ</div>
            <div class="list-line"></div>
        </v-row>
        <div class="mt-5 mypage">
            <v-card color="basil">
                <v-tabs v-model="tab" background-color="transparent" color="black" grow >
                    <v-tab v-for="item in items" :key="item.href" :to="item.href">
                        {{ item.name }}
                    </v-tab>
                </v-tabs>

                <v-tabs-items v-model="tab" v-if="type!=null">
                    <InformationEdit :userDetail="userDetail" />
                </v-tabs-items>
                <v-tabs-items v-model="tab" v-else>
                    <Information :userDetail="userDetail" :prefectureName="prefectureName" />
                </v-tabs-items>
            </v-card>
        </div>
    </v-container>
</template>

<script>
import Information from '~/components/mypage/Information.vue'
import InformationEdit from '~/components/mypage/InformationEdit.vue'

export default {
    head () {
      return { title: '会員様登録情報' }
    },
    middleware: 'authenticated',
    components: {
        Information,
        InformationEdit,
    },
    data () {
      return {
        userDetail: {},
        prefectureName: '',
        type: null,
        tab: "mypage",
        items: [
            {
                name: '会員様登録情報',
                href: 'mypage'
            },
            {
                name: 'お気に入り一覧',
                href: 'favorite'
            },
            {
                name: '閲覧履歴一覧',
                href: 'history'
            },
            {
                name: 'お見積り一覧',
                href: 'estimate'
            },
            {
                name: '出品登録車種一覧',
                href: 'sellingcar'
            }
        ]
      }
    },
    watch: {
        $route(to, from) {
            this.getUser()
            this.type = this.$route.query.type ? this.$route.query.type : null
        },
    },
    methods: {
        getUser () {
            let url = `customer/`+this.$store.state.auth.user.id;
            this.$axios.get(url, {})
            .then((res) => {
                if (res.status) {
                    if(res.data){
                        this.userDetail = res.data.data.user
                        this.prefectureName = res.data.data.prefecture.name
                    }
                }
            })
        },
    },
    mounted () {
        this.getUser()
        this.$nextTick(() => {
            this.$nuxt.$loading.start()
            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })
        this.type = this.$route.query.type ? this.$route.query.type : null
    },
  }
</script>
