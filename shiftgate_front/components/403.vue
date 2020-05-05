<template>
    <v-container grid-list-xs>
        <v-row>
            <v-col align="center" class="mt-10">
                <p style="font-size: 30px">403 Forbidden</p>
                <p>このサーバーで/にアクセスする権限がありません。</p>
            </v-col>
        </v-row>
        <v-row>
            <v-col align="center">
                <v-btn color="secondary" @click="linkToUrl('/search')">検索車に戻る</v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
    export default {
        methods: {
            linkToUrl(url) {
                this.$router.push(url);
            },
        },
    }
</script>