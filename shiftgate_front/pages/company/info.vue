<template>
    <v-container class="mb-5 text-gray line-height-2 static-page">
        <v-row align="center" justify="center">
            <div class="list mb-3 ml-3 mr-3">会社概要</div>
            <div class="list-line mb-3 mr-3 ml-3"></div>
        </v-row>
        <v-row class="pt-5">
            <v-col>
                <table class="table-info text-gray">
                    <tr>
                        <th>社名</th>
                        <td>株式会社SHIFTGATE</td>
                    </tr>
                    <tr>
                        <th>代表者</th>
                        <td>相川 政二</td>
                    </tr>
                    <tr>
                        <th>所在地</th>
                        <td>東京都中央区銀座七丁目3番5号</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>0120-915-237</td>
                    </tr>
                    <tr>
                        <th>設立</th>
                        <td>2018年7月4日</td>
                    </tr>
                </table>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>

export default {
    name: 'company-info',
    components: {
    },
    head () {
      return { title: '会社概要' }
    },
    mounted () {
    this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 1000)
    })}
}
</script>
