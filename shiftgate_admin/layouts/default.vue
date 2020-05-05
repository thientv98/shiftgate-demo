<template>
    <v-app>
        <app-drawer></app-drawer>
        <app-toolbar></app-toolbar>

        <!-- Sizes your content based upon application components -->
        <v-content>

            <!-- Provides the application the proper gutter -->
            <v-container fluid pt-0>
                <client-only>
                    <notifications/>
                </client-only>
                <!-- If using vue-router -->
                <router-view></router-view>
            </v-container>
        </v-content>

        <v-footer app>
            <!-- -->
        </v-footer>
    </v-app>
</template>

<script>
import AppDrawer from '@/components/AppDrawer'
import AppToolbar from '@/components/AppToolbar'

export default {
    components: {
        AppDrawer,
        AppToolbar
    }
}
</script>