<template>
    <v-row justify="center" align="center">
        <v-dialog :value="dialog" max-width="600px" @input="changeDialog(false)" content-class="confirm-signature-dialog">
            <v-btn tile large color="#203c58" icon class="close-modal" @click="changeDialog(false)">
                <v-icon>fas fa-times</v-icon>
            </v-btn>
            <v-card class="pt-7 pb-0 px-12 login-panel confirm-signature-modal">
                <v-row align="center" justify="center">
                <div class="confirm-signature">
                    <v-row align="center" justify="center">
                        <div class="list mb-3">契約署名確認</div>
                        <div class="list-line mb-3 mr-3 ml-3"></div>
                    </v-row>
                    <v-row align="center" justify="center" class="text-gray">
                        氏名に間違いがなければ確定を押してください。
                    </v-row>
                    <v-row align="center" justify="center" class="text-size-3 text-gray font-weight-bold my-8">
                        {{ user_signature ? user_signature : '' }}
                    </v-row>
                    <v-row align="center" justify="center" class="text-gray mb-3">
                        ※確定すると氏名の変更はできません。
                    </v-row>
                    <v-row class="justify-center align-center">
                        <v-btn class="effect effect-1 ma-2 login-submit mb-7" title="確定" 
                            :disabled="user_signature==null ? true : false" @click="submit">確定</v-btn>
                    </v-row>
                </div>
                </v-row>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
export default {
    props: ['dialog', 'carDetail', 'user_signature'],
    data () {
        return {
        }
    },
    mounted () {
        
    },
    methods: {
        changeDialog(dia){
            this.$emit('bindingData', dia);
        },

        submit () {          
            let params = null
            if(this.user_signature) {

                let id = this.$store.state.auth.user.id                
                if(id == this.carDetail.customer_id) {
                    params = { seller_signature: this.user_signature }
                } else if (id == this.carDetail.buyer_id) {
                    params = { buyer_signature: this.user_signature }
                }
                
                this.$axios.put(`cars/${this.carDetail.id}`, params).then(res => {
                    this.checked = false
                    this.$emit('bindingData', false);
                });
            }
        },   
    },
}
</script>