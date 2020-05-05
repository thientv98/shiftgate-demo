<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">車両画像管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>
        
        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile="">
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn color="error" @click="deleteImages">削除</v-btn>
            </v-card-actions>
            
            <v-divider></v-divider>
           
            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="listImage"
                    :loading="loading"
                    :loading-text="loadingText"
                    :options.sync="options"
                    :show-select="true"
                    :hide-default-footer="true"
                    v-model="selectedItems"
                    item-key="No"
                    class="elevation-1"
                >

                <!-- Slot Column Image -->
                <template v-slot:item.Image="{item}" >
                        <div class="pt-5">
                            <v-img 
                                class="thumbnail"
                                v-if="item.Image"
                                :src="item.Image"
                                :lazy-src="item.Image"
                                aspect-ratio="3"
                                max-width="200"
                                max-height="300"
                                @click="openGallery(item.Image)"
                            ></v-img>
                        </div>
                </template>

                <!-- Slot Column Actions -->
                <template v-slot:item.actions="{item}">
                    <v-btn v-if="item.Image" color="green" class="border-btn" @click="downloadFile(item)">ダウンロード</v-btn>
                    <v-btn color="gray" class="border-btn" @click="showPopupAddImage(item)">編集</v-btn>
                </template>

                <template v-slot:top>
                    <trade-upload-image-modal
                        :dialogUploadImage="dialogUploadImage"
                        :itemSelected="itemSelected"
                        @closeModalUploadImage="closeModalUploadImage"
                        @reloadList="init"
                    ></trade-upload-image-modal>
                </template>

                </v-data-table> 
            </v-card-text>

            <!-- Modal delete item selected -->
            <template>
                <common-delete-modal 
                    :dialog="dialogDelete"
                    :url="deleteUrl"
                    @closeModal="closeModal"
                    @reloadList="init"
                    :urlPost="true"
                ></common-delete-modal>
            </template>

            <LightBox 
                :images="images"
                ref="refLightBox"
                :showThumbs="false"
                :showLightBox="false"
            ></LightBox>
        </v-card>
    </v-container>
</template>

<script>
import Util from '@/util';
import axios from 'axios'
import LightBox from 'vue-image-lightbox'
import CommonDeleteModal from '@/components/modals/common/delete'
import TradeUploadImageModal from '@/components/modals/trade/upload_image'

export default {
    name: 'app-car-images',
    components: {
        LightBox, CommonDeleteModal, TradeUploadImageModal
    },
    data: () => ({
        headers: [
            { text: 'No', value: 'No', sortable: false, width: '30%' },
            { text: '画像', value: 'Image', sortable: false},
            { text: '', value: 'actions', sortable: false, align: 'right'}
        ],
        loading: false,
        breadcrumbs: [
            {
                text: 'Home',
                disabled: false,
                href: '/',
            },
            {
                text: '車両一覧',
                href: '/trade',
            },
            {
                text: '車両詳細',
                href: 'detail',
            },
             {
                text: 'コンタクト管理',
            }
        ],
        tradeDetail: {},
        listImage: [],
        options: {itemsPerPage: 25},
        images: [],
        selectedItems: [],
        dialogDelete: false,
        deleteUrl: '',
        urlPost: true,
        dialogUploadImage: false,
        itemSelected: '',
        sellerData: {},
    }),
    
    watch: {
        options: {
            handler () {
                this.init()
            }
        },
    },

    computed: {
        loadingText () {
            return this.$t('common.paging_loading')
        },
    },

    created () {
        this.init();
    },

    methods: {
        async init() {
            this.loading = true;
            this.selectedItems = [];
            try {
                await this.$axios.get("trade/" + this.$route.params.id).then(res => {
                    this.listImage = [];
                    this.tradeDetail = res.data.data.detail;
                    this.sellerData = res.data.data.sellerData
                    for (let index = 1; index <= 25; index++) {
                        let numberImage = 'image'+index;
                        const element = this.tradeDetail[numberImage];
                        this.listImage.push({No: numberImage, Image: element});
                    }
                })
            } catch (e) {
                console.log(e.message)
            }
            this.loading = false
        },

        showPopupAddImage(item) {
            console.log(item)
            this.dialogUploadImage = true;
            this.itemSelected = item.No
        },

        openGallery(listImage) {
            this.images = [ { src: listImage} ];
            this.$refs['refLightBox'].showImage(0);
        },

        deleteImages() {
            let imageFields = []
            if(this.selectedItems){
                this.selectedItems.forEach(element => {
                    imageFields.push(element.No);
                });
            }
            this.deleteUrl = 'trade/delete-images?id='+ this.$route.params.id +'&listImage=' + imageFields.toString()
            this.dialogDelete = true
        }, 

        closeModal() {
            this.dialogDelete = false
        },

        closeModalUploadImage() {
            this.dialogUploadImage = false
        },

        downloadFile(image) {
            let user = this.sellerData
            Util.download(image.Image, user.last_name + user.first_name + '-' + image.No + '.jpg', "image/jpg")
        },
    },
} 
</script>

<style>
    .thumbnail {
        display: inline-block;
        max-width: 100%; /* only this one important */
        margin-bottom: 1rem;
        border: solid 4px #fefefe;
        border-radius: 3px;
        box-shadow: 0 0 0 1px rgba(10, 10, 10, 0.2);
        line-height: 0; 
    }
    .border-btn {
        border: 1px solid #e4e4e4;
    }
</style>