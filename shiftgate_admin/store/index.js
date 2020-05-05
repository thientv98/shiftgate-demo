import axios from 'axios'

export const state = () => ({
    locales: ['en', 'ja'],
    locale: 'en',
    drawer: true
})

export const mutations = {
    SET_LANG (state, locale) {
        if (state.locales.includes(locale)) {
            state.locale = locale
        }
    },
    TOOGLEDRAWER(state) {
        state.drawer = !state.drawer
    },
    DRAWER(state, val) {
        state.drawer = val
    }
}
  
export const actions = {
    // nuxtServerInit is called by Nuxt.js before server-rendering every page
    nuxtServerInit ({ commit }, { req }) {
    }
}