<template>
    <v-row justify="center" align="center">
        <v-dialog :value="dialog" max-width="770px" @input="changeDialog(false)" content-class="electronic-signature-dialog">
            <v-card>
                <v-card-title class="headline px-3">
                    <div class="title">電子署名</div>
                </v-card-title>

                <v-card-text class="pt-5">
                    ご契約書に同意いただき、契約締結する場合は、下記2点にご同意、チェックいただき<br>
                    本サイトにご登録いただいてますメールアドレスを入力後、電子署名するのボタンをクリックください。<br>
                    <b>署名完了まで、数分お時間をいただくことがございます。</b>
                </v-card-text>
                <v-card-text class="pt-4">
                    <v-checkbox data-vv-name="checked" v-model="checkBox1" class="mt-0 remove-checkedbox-v-message">
                        <div slot='label' class="checkbox-slot pt-1">
                            <b><a @click.stop="openInNewTab('/terms')" href="/terms" target="_blank">SHIFT-GATE利用規約 </a>、
                            <a @click.stop="openInNewTab('/privacy')" href="/privacy" target="_blank">個人情報の取り扱いに関する基本方針</a>に同意します。 </b>
                        </div>
                    </v-checkbox>
                    <v-checkbox data-vv-name="checked" v-model="checkBox2" class="mt-0">
                        <div slot='label' class="checkbox-slot pt-1">
                            <b>私は反社会勢力でないことまた関連が無いことを表明します</b>
                        </div>
                    </v-checkbox>
                </v-card-text>
                <v-card-text class="pt-0 pb-2 px-6">
                    <div>ご登録のメールアドレス</div>
                    <v-text-field outlined dense class="w-100 ref_code" placeholder="メールアドレス" v-model="form.email" 
                    :error-messages="errors.email ? errors.email[0] : ''" ></v-text-field>
                </v-card-text>
                <div class="pb-5 text-center">
                    <div class="mb-5" v-if="completed">電子署名に成功しました</div>
                    <div class="mb-5 error-message" v-if="error">
                        電子証明に失敗しました。<br>
                        SHIFT-GATEコンシェルジュへご連絡ください。
                    </div>
                    <v-btn :loading="loading" depressed class="px-12 btn-signature_contract" @click="submit()" :disabled="!checkBox1 || !checkBox2 || completed">電子署名する</v-btn>
                </div>
            </v-card>
        </v-dialog>
        <v-overlay :value="loading" z-index="1000"></v-overlay>
    </v-row>
</template>

<script>
export default {
    props: ['dialog', 'carDetail', 'file'],
    data () {
        return {
            checkBox1: false,
            checkBox2: false,
            loading: false,
            completed: false,
            error: false,
            form: {
                email: null,
            },
        }
    },
    mounted () {
        
    },
    methods: {
        changeDialog(dia){
            this.$emit('bindingData', dia)
        },
        submit(){
            this.loading = true
            this.error =false
            this.$axios.post('/test-gmo',
            {
                car_id: this.carDetail.id,
                file_type: this.file.type,
                email: this.form.email,
                userEmail: this.$store.state.auth.user.email,
                partner_signing_id: this.$store.state.auth.user.id,
            }).then((res) => {
                this.loading = false
                if(res.data.code == 200){
                    this.completed = true
                    this.$emit('disableButton')
                }else{
                    this.error = true
                }
            }).catch(err => {
                this.loading = false
                if(err.response.status != 422){
                    this.error = true
                }
            })
        },
        openInNewTab(url){
            let tab = window.open(url, '_blank');
            tab.focus();
        },
    },
}
</script>