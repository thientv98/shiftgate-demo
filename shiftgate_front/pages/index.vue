<template>
  <v-layout column justify-center align-center>  
    <v-container fluid class="pa-0 pt-0 slider">
        <iframe src="/slider" width="100%" height="376px" frameborder="0" class="iframe-slider"/>
        <BottomSlider />
    </v-container>
    <Brand />

    <Arrival />

    <Notice />
    
    <Contact />
  </v-layout>
</template>

<script>
import Logo from '~/components/Logo.vue'
import Slider from '~/components/home/Slider.vue'
import BottomSlider from '~/components/home/BottomSlider.vue'
import VuetifyLogo from '~/components/VuetifyLogo.vue'
import Brand from '~/components/home/Brand.vue'
import Arrival from '~/components/home/Arrival.vue'
import Notice from '~/components/home/Notice.vue'
import Contact from '~/components/home/Contact.vue'

export default {
    components: {
        Logo,
        VuetifyLogo,
        Slider,
        BottomSlider,
        Brand,
        Arrival,
        Notice,
        Contact
    },data () {
        return {

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
