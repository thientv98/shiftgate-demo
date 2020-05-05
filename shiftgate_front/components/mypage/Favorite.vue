<template>
    <v-tab-item value="favorite">
        <v-card flat color="basil">
            <!-- List Car -->
            <ListCar :url="urlListCar" :flag="flag"/>
            <!-- End List Car -->
        </v-card>
    </v-tab-item>
</template>
<script>
import ListCar from '~/components/common/ListCar.vue'

export default {
    name: 'favorite-component',
    components: {ListCar},
    data () {
        return {
            urlListCar: 'my-car',
            flag: 'favorite'
        }
    },
}
</script>