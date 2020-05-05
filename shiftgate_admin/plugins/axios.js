export default function({$axios, store}){
    $axios.onError(error => {
        if(error.response.status === 422){
            if(error.response.data.errors) {
                store.dispatch('validation/setErrors', error.response.data.errors)
            } else {
                store.dispatch('validation/setErrors', error.response.data.message)
            }
        }

        return Promise.reject(error);
    })

    $axios.onRequest(()=>{
        store.dispatch('validation/clearErrors')
    })
}