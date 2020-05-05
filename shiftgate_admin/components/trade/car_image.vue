<template>
    <v-card flat>
        <v-container fluid>
            <v-card-text class="pb-0">
                <p class="text-center" :hidden="noImage">No Car Images</p>
                <v-row v-if="noImage">
                    <v-col sm="4">
                        <v-img
                            :src="tradeDetail.image1"
                            :lazy-src="tradeDetail.image1"
                            aspect-ratio="1"
                            @click="openGallery(0, image1_25)"
                        ></v-img>
                    </v-col>
                    <v-col sm="8">
                        <v-row>
                            <v-col
                                v-for="(item, index) in listImage" :key="index"
                                class="d-flex child-flex pa-0 px-1 pb-2"
                                cols="2"
                            >
                                <v-card flat tile class="d-flex">
                                    <v-img
                                        :src="item"
                                        :lazy-src="item"
                                        aspect-ratio="1"
                                        class="grey lighten-2"
                                        @click="openGallery(index+1, image1_25)"
                                    >
                                    <template v-slot:placeholder>
                                        <v-row class="fill-height ma-0" align="center" justify="center">
                                            <v-progress-circular indeterminate></v-progress-circular>
                                        </v-row>
                                    </template>
                                    </v-img>
                                </v-card>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col class="pb-0" align="end"><v-btn color="primary" @click="linkToRoute('images')">画像編集</v-btn></v-col>
                </v-row>
            </v-card-text>
            <LightBox 
                :images="images"
                ref="refLightBox"
                :showThumbs="false"
                :showLightBox="false"
            ></LightBox>
        </v-container>
    </v-card>
</template>

<script>
import axios from 'axios'
import Util from '@/util';
import LightBox from 'vue-image-lightbox'

export default {
    name: 'car_image',
    components: {
        LightBox,
    },
    props: ['tradeDetail'],
    data() {
        return {
            images: [],
        }
    },

    methods: {
        openGallery(index, listImage) {
            this.images = listImage;
            this.$refs['refLightBox'].showImage(index);
        },
        linkToRoute(link){
            this.$router.push(link);
        },
    },

    computed: {
        // image1() {
        //     return [ { src: this.tradeDetail.image1} ];
        // },
        image1_25() {
            let result = [];
            for (let index = 1; index <= 25; index++) {
                let numberImage = 'image'+index;
                const element = this.tradeDetail[numberImage];
                if(element) result.push({src: element});
            }
            return result;
        },
        listImage() {
            let result = [];
            for (let index = 2; index <= 25; index++) {
                let numberImage = 'image'+index;
                const element = this.tradeDetail[numberImage];
                if(element) result.push(element);
            }
            return result;
        },
        noImage() {
            return this.tradeDetail.image1 ? true : false;
        }
    },
} 
</script>

<style>
    .v-card__title .mdi:before{
        font-size: 10px;
        padding-bottom: 5px;
    }
    .v-image__image--cover {
        border: 1px solid darkgrey;
    }
</style>