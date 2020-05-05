<template>
    <div class="car-detail-slider">
        <div ref="wrapper" class="my-5"></div>
        <div v-if="carDetail.is_in_contract == 1 && !flag" class="text-bottom-slider">
            <div class="text-white text-overlay">成約済み</div>
            <div class="overlay"></div>
        </div>
        <div v-else-if="carDetail.is_in_transaction == 1 && !flag" class="text-bottom-slider">
            <div class="text-white text-overlay">商談中</div>
            <div class="overlay"></div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: 'car-slider',
    components: {},
    props: ['carDetail'],
    data() {
        return {
            images: [],
            flag: false
        }
    },
    created() {
        this.flag = this.$route.query.flag == 'estimate' || this.$route.query.flag == 'selling-car' ? true : false
    },
    watch: {
        carDetail: {
            handler() {
                this.init()
            }
        }
    },
    mounted () {
        this.init()
    },
    methods: {
        init () {
            this.images = []
            for (let i = 1; i < 26; i++) {
                let img = this.carDetail['image' + i]
                if(img) {
                    this.images.push({ "large": img, "thumb": img })
                }
            }
            
            setTimeout(() => {
                kGallery({
                    wrapper: $(this.$refs.wrapper),
                    startItem: 0,
                    autoPlay: false,
                    dataType: 'array',
                    thumbnailPickerOptions: {
                        vertical: true,
                        itemsOnPage: 12
                    },
                    dataSource: this.images
                });
            }, 500);
        },
    },
}
</script>