export const commonMethod = {
    methods: {
        addOptionAllToSelect(items) {
            let itemNull = [{ value: "", name: '---' }]
            return itemNull.concat(items)
        },
        formatTypeId(type, id) {
            if (id && type) {
                var s = id.toString()
                while (s.length < (8 || 2)) {
                    s = "0" + s
                }
                return type + s
            } else {
                return ""
            }

        }
    }
}