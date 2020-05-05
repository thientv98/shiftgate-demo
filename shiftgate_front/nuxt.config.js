import colors from 'vuetify/es5/util/colors'
require('dotenv').config()

export default {
  mode: 'universal',

  /*
  ** Headers of the page
  */
  head: {
    // titleTemplate: '%s - ' + process.env.npm_package_name,
    titleTemplate: (titleChunk) => {return titleChunk ? `SHIFTGATE | ${titleChunk}` : 'SHIFTGATE'},
    title: '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons'},
      { rel: "apple-touch-icon", sizes: "180x180", href: "/apple-touch-icon.png" },
      { rel: "icon", type: "image/png", sizes: "32x32", href: "/favicon-32x32.png" },
      { rel: "icon", type: "image/png", sizes: "16x16", href: "/favicon-16x16.png" },
      { rel: "manifest", href: "/site.webmanifest" }
    ],
    script: [
      { src: '/js/jquery-1.4.2.js' },
      { src: '/js/jquery.panorama.js' },
      { src: '/js/cvi_text_lib.js' },
      { src: '/js/jquery.advanced-panorama.js' },
      { src: '/js/jquery.flipv.js' },
      { src: '/js/kGallery-full.min.js' },
    ],
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#375c7f' },
  /*
  ** Global CSS
  */
  css: [
    '~/static/css/jquery.panorama.css',
    '~/static/css/home.css',
    '~/static/fontawesome/css/all.css',
    '~/static/css/kGallery.css',
    '~/static/css/chat.css'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/i18n.js',
    '~/plugins/mixins/validation',
    '~/plugins/mixins/user',
    '~/plugins/axios',
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
    '@nuxtjs/auth',
    'cookie-universal-nuxt',
    'nuxt-basic-auth-module',
    ['@nuxtjs/google-tag-manager', { id: 'GTM-XXXXXXX' }],
  ],
  basic: {
    name: 'shift',
    pass: 'gate',
    enabled: process.env.BASIC_ENABLED === 'true'
  },
  /*
  ** vuetify module configuration
  ** https://github.com/nuxt-community/vuetify-module
  */
  vuetify: {
    customVariables: ['~/assets/variables.scss'],
    theme: {
      // dark: true,
      themes: {
        dark: {
          primary: colors.blue.darken2,
          accent: colors.grey.darken3,
          secondary: colors.amber.darken3,
          info: colors.teal.lighten1,
          warning: colors.amber.base,
          error: colors.deepOrange.accent4,
          success: colors.green.accent3
        }
      }
    }
  },
  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  },
  router: {
    scrollBehavior(to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition
      } else {
        let position = {}
        if (to.matched.length < 2) {
          position = { x: 0, y: 0 }
        } else if (to.matched.some(r => r.components.default.options.scrollToTop)) {
          position = { x: 0, y: 0 }
        }
        if (to.hash) {
          position = { selector: to.hash }
        }
        return position
      }
    },
    middleware: 'routing'
  }
}
