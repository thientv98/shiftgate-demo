export const state = () => ({
    textSearchBrand:  '',
    paramsSearch: {
        textSearch: '',
        sortById: '',
        sortByFirstRegistrationDate: '',
        sortByMileage: '',
    },
    revertParamFromState: false,
    carDetail: null,
    currentPage: 1,
    actions: null,
    actionsDetail: null
})

export const mutations = {
    updateParamsSearch (state, paramsSearch) {
        state.paramsSearch = paramsSearch
    },
    revertParamFromState (state, revert) {
        state.revertParamFromState = revert
    },
    saveCarDetail(state, carDetail){
        state.carDetail = carDetail
    },
    updateCurrentPage(state, currentPage) {
        state.currentPage = currentPage
    },
    updateActions(state, actions) {
        state.actions = actions
    },
    updateActionsDetail(state, actions) {
        state.actionsDetail = actions
    },
    resetRevertStatus(state) {
        state.revertParamFromState = false
    },
    updateBrandSearch(state, brandName) {
        state.textSearchBrand = brandName
    }
}