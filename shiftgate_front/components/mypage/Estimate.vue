<template>
    <v-tab-item value="estimate">
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
    name: 'estimate-component',
    components: {ListCar},
    data () {
        return {
            urlListCar: 'my-car',
            flag: 'estimate'
        }
    },
}
</script>