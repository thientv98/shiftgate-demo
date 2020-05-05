<template>
    <div class="mb-3">
        <v-toolbar white>
            <div class="flex-grow-1 hidden-sm-and-down"></div>

            <nuxt-link to="/"  class="pt-3">
                <img class="logo" src="/images/index/shiftgate_logo.png" alt="">
            </nuxt-link>

            <div class="flex-grow-1"></div>

            <v-toolbar-items v-for="(item, i) in items" :key="i">
                <v-btn text class="hidden-sm-and-down menu-item" :to="item.to">{{item.title}}</v-btn>
            </v-toolbar-items>

            <div class="flex-grow-1"></div>

            <v-toolbar-items class="pt-1" style="height: 75px">
                <!--not login -->
                <v-btn text class="float-right btn-login-header hidden-sm-and-down pa-0" to="/login" v-show="!this.$store.state.auth.loggedIn && !isMobile">
                    <v-img :src="`/images/index/header_login.png`" aspect-ratio="1.3" contain></v-img>
                </v-btn>
                <v-btn text class="float-right btn-signup-header hidden-sm-and-down pa-0" to="/register" v-show="!this.$store.state.auth.loggedIn">
                    <v-img :src="`/images/index/header_signup.png`" aspect-ratio="1.3" contain></v-img>
                </v-btn>
                <!-- login -->
                <v-btn text class="float-right btn-mypage-header hidden-sm-and-down pa-0" to="/mypage" v-show="this.$store.state.auth.loggedIn">
                    <v-img :src="`/images/index/header_mypage.png`" aspect-ratio="1.3" contain></v-img>
                </v-btn>
                <v-btn text class="float-right btn-logout-header hidden-sm-and-down pa-0" @click="handleLogout" v-show="this.$store.state.auth.loggedIn && !isMobile">
                    <v-img :src="`/images/index/header_logout.png`" aspect-ratio="1.3" contain></v-img>
                </v-btn>
            </v-toolbar-items>

            <template>
                <v-app-bar-nav-icon @click.stop="drawer = !drawer" class="hidden-md-and-up navigator"></v-app-bar-nav-icon>
            </template>
        </v-toolbar>

        <v-navigation-drawer key="drawer" v-model="drawer" absolute persistent temporary
            right :class="[drawer ? 'show' : '']" class="nav-custom hidden-md-and-up">
            <v-list dense class="naviagtion-list">
                <v-list-item-group v-model="group" color="primary">
                    <v-list-item v-for="(item, i) in items" :key="i" :to="item.to">
                        <v-list-item-title to> {{item.title}} </v-list-item-title>
                    </v-list-item>

                    <!-- not login -->
                    <nuxt-link to="/login">
                        <v-list-item v-show="!this.$store.state.auth.loggedIn && !isMobile">
                            <v-list-item-title>ログイン</v-list-item-title>
                        </v-list-item>
                    </nuxt-link>
                    <nuxt-link to="/register">
                        <v-list-item v-show="!this.$store.state.auth.loggedIn">
                            <v-list-item-title>新規登録</v-list-item-title>
                        </v-list-item>
                    </nuxt-link>

                    <!-- login -->
                    <nuxt-link to="/mypage">
                        <v-list-item v-show="this.$store.state.auth.loggedIn">
                            <v-list-item-title>マイページ</v-list-item-title>
                        </v-list-item>
                    </nuxt-link>
                    <v-list-item v-show="this.$store.state.auth.loggedIn && !isMobile" @click="handleLogout">
                        <v-list-item-title>ログアウト</v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>

export default {
    data () {
        return {
            login: false,
            drawer: false,
            group: null,
            items: [
                {
                    title: '掲載一覧',
                    to: '/search'
                },
                {
                    title: 'シフトゲートの特徴',
                    to: '/company/features'
                },
                {
                    title: '車を買いたい方',
                    to: '/guide/buyer'
                },
                {
                    title: '車を売りたい方',
                    to: '/guide/seller'
                },
                {
                    title: '取引ガイド',
                    to: '/guide/trade'
                }
            ],
            dense: false,
            isMobile: 0
        }
    },
    created() {
        this.isMobile = this.$cookies.get('isMobile');
        this.login = this.$store.state.auth.loggedIn
    },
    watch: {
        group () {
            this.drawer = false
        },
    },
    methods: {
        async handleLogout() {
            await this.$auth.logout();
            this.$router.push('/login');
        }
    }
}
</script>
