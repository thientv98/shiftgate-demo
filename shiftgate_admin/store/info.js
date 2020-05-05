import Util from '@/util';


export const state = () => ({
    infoList: null,
})
  
export const mutations = {
    INFO_LIST (state, list) {
        state.infoList = list
    },
}
  
export const actions = {
    async infoList ({ commit }, params) {
        try {
            let s = Util.serializeObj(params)
            let url = `info/list?${s}`;
            await this.$axios.get(url)
                .then((res) => {
                    if (res.status === 200) { 
                        let result = res.data
                        if(result) {
                            let total = result.data.records.total
                            let data = result.data.records.data
                            let perPage = result.data.records.per_page
                            commit('INFO_LIST', {total, data, perPage})
                        }
                    }
                })
        } catch (error) {
            if (error.response && error.response.status === 401) {
                throw new Error('HTTP Status Code 401: Unauthorized')
            }
            throw error
        }
    },
}

export const getters = {
    
}