export const commonMethod = {
    methods: {
        addOptionAllToSelect(items) {
            let itemNull = [{ id: null, name: '---' }]
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

        },
        formatPrice(price) {
            return price >= 10000 ? price/10000 : price
        },
        formatDecimal(value) {
            let val = (value/1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        },
        getYear(date) {
            var newDate = new Date(date);
            return newDate.getFullYear();
        },

        calcYear(date) {
            var newDate = new Date(date);
            var arrDate = {
                'R': '2019/05/01',
                'H': '1989/01/08',
                'S': '1926/12/25',
                'T': '1912/07/30',
                'M': '1868/01/25'
            };
            
            if (newDate < new Date(arrDate['M'])) {
                return '';
            }

            var r = newDate.toLocaleDateString('ja-JP-u-ca-japanese');
            
            if (r === 'Invalid Date') {
                return '';
            }
            r = r.replace(/^.*?(\d{1,2}).+?$/g, '$1');
            

            var ua = navigator.userAgent.toLowerCase();
            if (!/msie|trident\/7|edge/.test(ua)) {
                
                var m = new Date('1868/09/07');
                if (newDate <= m) r -= 3;
            }
            
            if (newDate >= new Date(arrDate['R'])) {
                return '(' + 'R' + r + ')';
            }
            else if (newDate >= new Date(arrDate['H'])) {
                return '(' + 'H' + r + ')';
            }
            else if (newDate >= new Date(arrDate['S'])) {
                return '(' + 'S' + r + ')';
            }
            else if (newDate >= new Date(arrDate['T'])) {
                return '(' + 'T' + r + ')';
            }
            else if (newDate >= new Date(arrDate['M'])) {
                return '(' + 'M' + r + ')';
            }
        }
    }
}