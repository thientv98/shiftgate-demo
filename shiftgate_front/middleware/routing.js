/* eslint-disable no-undef */
/* eslint-disable no-console */
export default function (context) {
    if (process.client) {
      const from = context.from

      if(from.name != 'login' && from.name != 'index' && from.name != 'search' && from.name != 'car-id-detail'){
        context.store.commit('search/revertParamFromState', false)
      }
    }
}