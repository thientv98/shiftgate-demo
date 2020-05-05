<template>
    <v-tab-item value="sellingcar">
        <v-card flat color="basil">
            <!-- List Car -->
            <ListCar :url="urlListCar" :flag="flag" :showTraddingCondition="true"/>
            <!-- End List Car -->
        </v-card>
    </v-tab-item>
</template>
<script>
import ListCar from '~/components/common/ListCar.vue'

export default {
    name: 'sellingcar-component',
    components: {ListCar},
    data () {
        return {
            urlListCar: 'my-car',
            flag: 'selling-car'
        }
    },
}
</script>