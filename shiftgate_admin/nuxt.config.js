import colors from 'vuetify/es5/util/colors'
require('dotenv').config()

export default {
    mode: 'spa',
    /*
    ** Headers of the page
    */
    head: {
        titleTemplate: '%s',
        title: 'SHIFT-GATE管理ツール',
        meta: [
            { charset: 'utf-8' },
            { name: 'viewport', content: 'width=device-width, initial-scale=1' },
            { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
        ],
        link: [
            { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
            // { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap' }
        ],
        script: [
            { src: 'https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js' },
            { src: '/js/htmldiff.js' }
        ],
    },

    /*
    ** Customize the progress-bar color
    */
    loading: { color: '#fff' },

    /*
    ** Global CSS
    */
    css: [
        '~/assets/custom-admin.scss',
        'vue-image-lightbox/dist/vue-image-lightbox.min.css'
    ],
    router: {
        middleware: ['i18n', 'clear_validation_errors', 'auth']
    },

    /*
    ** Plugins to load before mounting the App
    */
    plugins: [
        '~/plugins/i18n.js',
        '~/plugins/mixins/validation',
        '~/plugins/mixins/user',
        '~/plugins/axios',
        '~/plugins/lightbox',
        { src: '~/plugins/vue-notification', mode: 'client'}  
    ],

    /*
    ** Nuxt.js dev-modules
    */
    buildModules: [
        '@nuxtjs/vuetify',
        '@nuxtjs/dotenv',
    ],

    /**
     * Auth configuration
     */
    auth: {
        strategies: {
            local: {
                endpoints: {
                    login: {
                        url: 'auth/login', method: 'post', propertyName: 'token'
                    },
                    user: {
                        url: 'me', method: 'get', propertyName: 'data'
                    },
                    logout: {
                        url: 'auth/logout', method: 'get'
                    }
                },
            }
        },
        redirect: {
            login: '/auth/login'
        }
    },

    /*
    ** Nuxt.js modules
    */
    modules: [
        '@nuxtjs/axios',
        '@nuxtjs/auth'
    ],

    /*
    ** vuetify module configuration
    ** https://github.com/nuxt-community/vuetify-module
    */
    vuetify: {
        customVariables: ['~/assets/variables.scss'],
        theme: {
            dark: false,
            themes: {
                dark: {
                    primary: colors.blue.darken2,
                    accent: colors.grey.darken3,
                    secondary: colors.amber.darken3,
                    info: colors.teal.lighten1,
                    warning: colors.amber.base,
                    error: colors.deepOrange.accent4,
                    success: colors.green.accent3,
                    yellow: colors.yellow.accent-3
                },
                light: {
                    primary: '#3E51B5',
                    accent: colors.grey,
                    secondary: colors.amber,
                    info: colors.teal,
                    warning: colors.amber,
                    error: colors.deepOrange,
                    success: colors.green,
                    yellow: colors.yellow.accent-3
                }
            }
        }
    },

    /*
    ** Build configuration
    */
    build: {
        standalone: true,
        /*
        ** You can extend webpack config here
        */
        extend (config, ctx) {
        }
    }
}
