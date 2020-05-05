export const state = () => ({
    deleteFileModal: false
})

export const mutations = {
    toggle_delete_modal(state) {
        state.deleteFileModal = !state.deleteFileModal
    }
}

export const actions = {
    toggleDeleteModal({ commit }) {
        commit('toggle_delete_modal')
    }
}

export const getters = {

}