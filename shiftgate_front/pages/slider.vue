<template>
    <v-container fluid class="pa-0 pt-4 slider">
        <Slider/>
    </v-container>
</template>

<script>
import Slider from '~/components/home/Slider.vue'

export default {
    layout: 'slider',
    components: {
        Slider
    }
}
</script>

<style lang="css">
    html{
        overflow-y: hidden;
    }
</style>