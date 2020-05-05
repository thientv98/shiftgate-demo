import Vue from 'vue'
import { mapGetters } from 'vuex'

const validation = {
    install(Vue, options){
        Vue.mixin({
            computed: {
                ...mapGetters({
                    user: 'user',
                    authenticated: 'authenticated'
                })
            }
        })
    }
}

Vue.use(validation)