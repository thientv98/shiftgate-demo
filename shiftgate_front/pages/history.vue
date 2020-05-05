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

                <v-tabs-items v-model="tab">
                    <History />
                </v-tabs-items>
            </v-card>
        </div>
    </v-container>
</template>

<script>
import History from '~/components/mypage/History.vue'

export default {
    head () {
      return { title: '閲覧履歴一覧' }
    },
    middleware: 'authenticated',
    components: {
        History
    },
    data () {
      return {
        tab: "history",
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
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
  }
</script>
