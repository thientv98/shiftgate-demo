<template>
<v-container>
    <div class="notice-section">
        
        <v-row class="mb-1">
            <v-col cols="12 notice-title">
                <span class="notice--title">お知らせ</span>
            </v-col>
        </v-row>
        <v-row class="pb-2" v-for="item in notices" :key="item.id">
            <v-col cols="4" sm="2" md="2" lg="2" class="notice--date pl-7">
                {{formatDate(item.published_date)}}
            </v-col>
            <v-col cols="8" sm="10" md="10" lg="8" class="notice--content">
                <a :href="'//' + replaceHttp(item.link_url)" target="_blank" v-if="item.link_url">{{item.content}}</a>
                <span v-else>{{item.content}}</span>
            </v-col>
        </v-row>

        <!-- <v-row class="justify-center align-center mb-4" v-show="totalPage > 1">
            <div class="text-center" style="width:100%">
                <v-pagination
                    v-model="currentPage"
                    :length="totalPage"
                    color="transparent"
                    @input="onPageChange"
                ></v-pagination>
            </div>
        </v-row> -->

        <div class="line-3" v-if="notices.length > 0"></div>
        
        
    </div>
</v-container>
</template>

<script>
import moment from "moment"

export default {
    data() {
        return {
            notices: [],
        }
    },
    created() {
        this.getNotice()
    },
    methods:{
        getNotice(){
            try {
                this.$axios.get("/notices?page=" + this.currentPage).then(res => {
                    this.notices = res.data.data
                    // this.total = res.data.data.total
                    // this.totalPage = res.data.data.last_page
                    // this.currentPage = res.data.data.current_page
                })
            } catch (e) {
                console.log(e.response)
            }
        },
        // onPageChange(){
        //     this.getNotice()
        // },
        formatDate(date) {
            return moment(date).format("YYYY-MM-DD")
        },
        replaceHttp(url){
            url = url.replace('http://', '')
            url = url.replace('https://', '')
            return url
        }
    }
}
</script>