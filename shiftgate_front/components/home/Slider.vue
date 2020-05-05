<template>
    <img ref="panorama" src="/images/index/slide.jpg" height="360px"/>
</template>

<script>
export default {
    mounted: function() {
        setTimeout(() => {
            $(this.$refs.panorama).panorama({
                auto_start: true,
                speed: 200000,
            });
        }, 500);
    }
}
</script>
