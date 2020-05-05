import Util from '@/util';


export const state = () => ({
    userList: null,
    memberList: null,
})
  
export const mutations = {
    USER_LIST (state, list) {
        state.userList = list
    },
    MEMBER_LIST (state, list) {
        state.memberList = list
    }
}
  
export const actions = {
    async userList ({ commit }, params) {
        try {
            let s = Util.serializeObj(params)
            let url = `user/list?${s}`;
            await this.$axios.get(url)
                .then((res) => {
                    if (res.status === 200) { 
                        let result = res.data
                        if(result) {
                            let total = result.data.records.total
                            let data = result.data.records.data
                            let perPage = result.data.records.per_page
                            commit('USER_LIST', {total, data, perPage})
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
    async memberList ({ commit }, params) {
        try {
            let s = Util.serializeObj(params)
            let url = `member/list?${s}`;
            await this.$axios.get(url)
                .then((res) => {
                    if (res.status === 200) { 
                        let result = res.data
                        if(result) {
                            let total = result.data.records.total
                            let data = result.data.records.data
                            let perPage = result.data.records.per_page
                            commit('MEMBER_LIST', {total, data, perPage})
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