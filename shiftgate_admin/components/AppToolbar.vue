<template>
    <v-app-bar app color="primary" fixed dark>
        <v-app-bar-nav-icon class="ml-3" @click.stop="toggleDrawer()"></v-app-bar-nav-icon>
        
        <v-spacer></v-spacer>
        <v-btn icon @click="handleFullScreen()">
            <v-icon>mdi-fullscreen</v-icon>
        </v-btn>

        <v-menu offset-y>
            <template v-slot:activator="{ on }">
                <v-btn v-on="on" icon large>
                    <v-avatar size="30px">
                        <!-- <img src="../static/avatar/man_4.jpg" alt="Michael Wang"/> -->
                        <v-icon>mdi-account-circle</v-icon>
                    </v-avatar>
                </v-btn>
            </template>

            <v-list dense="">
                <v-list-item-group color="primary">
                    <v-list-item v-for="(item,index) in items" :key="index" @click="item.click">
                        <v-list-item-icon v-if="item.icon">
                            <v-icon>mdi-{{ item.icon }}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content class="pr-10">
                            <v-list-item-title>{{ item.title }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-menu>
    </v-app-bar>
</template>

<script>
import Util from '@/util';

export default {
    name: 'app-toolbar',
    components: {},
    data:  function () {
        return {
            items: [
                {
                    icon: 'account-circle',
                    title: 'プロフィール',
                    click: (e) => {
                        this.$router.push('/auth/profile');
                    }
                },
                {
                    icon: 'logout',
                    title: 'ログアウト',
                    click: this.handleLogout
                }
            ]
        }
    },
    computed: {
        toolbarColor() {
            return this.$vuetify.options.extra.mainNav;
        }
    },
    methods: {
        toggleDrawer() {
            this.$store.commit('TOOGLEDRAWER')
        },
        handleFullScreen() {
            Util.toggleFullScreen();
        },
        async handleLogout() {
            await this.$auth.logout();
            this.$router.push('/auth/login');
        }
    }
};
</script>