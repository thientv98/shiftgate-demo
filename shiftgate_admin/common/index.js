export const common = {
    session: {
        set: (key, value) => {
            return sessionStorage.setItem(key, value)
        },
        get: (key) => {
            return sessionStorage.getItem(key)
        },
        unset: (key) => {
            return sessionStorage.removeItem(key)
        },
        clear: () => {
            return sessionStorage.clear()
        }
    }
}
