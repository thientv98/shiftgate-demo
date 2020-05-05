<template>
    <v-card flat>
        <v-container>
            <v-card-title class="pt-0 pb-0">車両の公開</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col sm="5">
                        <v-autocomplete
                            outlined dense 
                            v-model="tradeDetail.public_status_code" 
                            :items="addOptionAllToSelect(status)" 
                            item-value="code" item-text="name">
                        </v-autocomplete>
                    </v-col>
                    <v-col sm="7">
                        <v-btn @click="changeStatus" color="primary">保存</v-btn>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-container>
    </v-card>
</template>

<script>
import axios from 'axios'
import Util from '@/util';

export default {
    name: 'publish_car',
    props: ['tradeDetail'],
    data() {
        return {
            status: {}
        }
    },
    async created() {
        try {
            await this.$axios.get('get-all-status').then(res => {
                this.status = res.data.data;
            })
        } catch (e) {
            console.log(e.message)
        }

    },

    methods: {
        addOptionAllToSelect(items, text=null){
            let itemNull = [{code: null, name: '---'}];
            if(text) itemNull = [{code: null, name: '---'}];
            if(items) {
                return itemNull.concat(items)
            } else {
                return itemNull
            }
        },
        async changeStatus() {
            try {
                await this.$axios.put('trade/'+this.tradeDetail.id, { 'public_status_code': this.tradeDetail.public_status_code}).then(res => {
                    this.tradeDetail.public_status_code = res.data.data.public_status_code
                    this.$notify({
                        type: 'success',
                        title: res.data.message
                    });
                })
            } catch (e) {
                console.log(e.message)
            }
        }
    },

    computed: {

    },
} 
</script>