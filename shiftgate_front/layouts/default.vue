<template>
    <v-app>  

        <Header />

        <v-content>
            <v-container class="pa-0" fluid>
                <router-view />
            </v-container>
        </v-content>
        
        <Footer />

        <Chat />
    </v-app>

</template>

<script>

import Footer from '~/components/Footer.vue'
import Header from '~/components/Header.vue'
import Chat from '~/components/common/Chat.vue'

export default {
    components: {
        Footer,
        Header,
        Chat
    }
}
</script>
