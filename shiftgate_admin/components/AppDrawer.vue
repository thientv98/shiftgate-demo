<style scoped>
    .v-application .primary--text {
        color: white !important;
        caret-color: white !important;
    }
</style>
<template>
    <v-navigation-drawer id="appDrawer" :mini-variant.sync="mini" app 
        dark v-model="drawer" width="260"
        src="https://demos.creative-tim.com/vue-material-dashboard/img/sidebar-2.32103624.jpg">
        <v-toolbar color="primary darken-1" dark>
            <!-- <img src="../static/m.png" height="36" alt="Vue Material Admin Template"> -->
            <v-toolbar-title class="ml-0 pl-3">
                <span @click="linkToRoute('/')" class="hidden-sm-and-down">{{ $t('home.title') }}</span>
            </v-toolbar-title>
        </v-toolbar>

        <v-list>
            <template v-for="(item, i) in menus">
                <template>
                    <v-list-group v-if="item.items" :key="i" :prepend-icon="item.icon" no-action>
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title v-text="$t(item.title)"></v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <v-list-item v-for="subItem in item.items" :key="subItem.title" :to="subItem.href ? subItem.href : null">
                            <v-list-item-content>
                                <v-list-item-title v-text="$t(subItem.title)"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>                    
                    </v-list-group>
                    <v-list-item v-else :key="i" :to="item.href ? item.href : null">
                        <v-list-item-icon>
                            <v-icon v-text="item.icon"></v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title v-text="$t(item.title)"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </template>
        </v-list>
            
    </v-navigation-drawer>
</template>

<script>
import menu from '@/config/menu';

export default {
    name: 'app-drawer',
    components: {
    },
    props: {
        expanded: {
            type: Boolean,
            default: true
        }
    },
    data: () => ({
        mini: false,
        menus: menu
    }),
    computed: {
        drawer: {
            get() {
                return this.$store.state.drawer
            },
            set(val) {
                this.$store.commit('DRAWER', val)
            }
        },
        computeGroupActive() {
            return true;
        },
        sideToolbarColor() {
            return this.$vuetify.options.extra.sideNav;
        }
    },
    methods: {
        linkToRoute(link){
            this.$router.push(link);
        }
    }
}
</script>