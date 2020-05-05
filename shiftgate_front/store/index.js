import axios from 'axios'

export const state = () => ({
    drawer: true,
    busy: false,
    loggedIn: false,
    stategy: "local",
    user: false
})

export const getters = {
    authenticated(state){
        return state.auth.loggedIn
    },
    user(state){
        return state.auth.user
    }
}

export const mutations = {
    TOOGLEDRAWER(state) {
        state.drawer = !state.drawer
    },
    DRAWER(state, val) {
        state.drawer = val
    },
}
  
export const actions = {
    // nuxtServerInit is called by Nuxt.js before server-rendering every page
    nuxtServerInit ({ commit }, { req }) {
        var token = req.headers.authorization
        
        if((typeof token) == 'string' && token.indexOf('Bearer') != -1){
            this.$cookies.set('auth._token.local', token)
            this.$cookies.set('document_prefer', req.originalUrl)
            this.$cookies.set('isMobile', 1)
        }
    }
}
