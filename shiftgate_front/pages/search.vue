<template>
    <div>
        <v-container fluid class="pt-0">
            <v-container>
                <Search :total="total" @searchData="searchData" />

                <div class="mb-15">
                    <!-- List Car -->
                    <ListCar :showPaginateTop="true" :url="urlListCar" :flag="flag" @bindingData="bindingData" ref="listCar"/>
                    <!-- End List Car -->
                </div>
            </v-container>

        </v-container>
        <Contact />
    </div>
</template>

<script>

import Search from '~/components/list/Search.vue'
import ListCar from '~/components/common/ListCar.vue'
import Contact from '~/components/home/Contact.vue'

export default {
    head () {
      return { title: '掲載車両一覧' }
    },
    name: 'search',
    components: {
        ListCar,
        Search,
        Contact
    },
    data () {
        return {
            urlListCar: 'my-car',
            flag: 'search',
            textSearch: '',
            total: 0
        }
    },
    methods: {
        searchData(searchText, sortById, sortByFirstRegistrationDate, sortByMileage) {
            this.textSearch = searchText ? searchText : '';

            this.textSearch = this.$store.state.search.textSearchBrand ? this.$store.state.search.textSearchBrand :  this.textSearch

            //Save params search to store
            this.$store.commit('search/updateParamsSearch', {
                textSearch: this.textSearch,
                sortById: sortById,
                sortByFirstRegistrationDate: sortByFirstRegistrationDate,
                sortByMileage: sortByMileage
            })
            this.$refs.listCar.reloadData(this.textSearch, sortById, sortByFirstRegistrationDate, sortByMileage);

        },
        bindingData(total) {
            this.total = total
        }
    },
    mounted () {
        this.$nextTick(() => {
            this.$nuxt.$loading.start()
            setTimeout(() => this.$nuxt.$loading.finish(), 1000)
        })
    }
}
</script>


<style scoped>

</style>
