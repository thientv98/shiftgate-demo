<template>
    <v-row justify="center" align="center">
        <v-dialog :value="dialog" max-width="770px" @input="changeDialog(false)" eager content-class="electronic-signature-dialog">
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
                    <div id="candiv">
                        <canvas id="canvas" ref="canvas" v-on:touchstart="onDown()" v-on:touchmove="onMove()" v-on:touchend="onUp()"
                        v-on:mousedown="onMouseDown($event)" v-on:mousemove="onMouseMove($event)" v-on:mouseup="onMouseUp()"/>
                        <canvas id='blank' ref="blank" style='display:none'></canvas>
                    </div>
                        <v-btn depressed class="px-12 mt-1 btn-signature_contract" @click="clearCan()">クリア</v-btn>
                </v-card-text>
                <div class="pb-5 text-center">
                    <div class="mb-5" v-if="completed">電子署名に成功しました</div>
                    <div class="mb-5 error-message" v-if="error">
                        電子証明に失敗しました。<br>
                        SHIFT-GATEコンシェルジュへご連絡ください。
                    </div>
                    <v-btn :loading="loading" depressed class="px-12 btn-signature_contract" @click="submit()" :disabled="!isSignatureBlank || !checkBox1 || !checkBox2 || completed">電子署名する</v-btn>
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
            signature_img: '',
            blankSignature: '',
            signature: {
                can: {},
                ct: {},
                mf: false,
                x: 0,
                y: 0,
                ox: 0,
                oy: 0,
            }
        }
    },
    mounted () {
        this.signature.canvas = this.$refs.canvas

        //create a blank canvas to validate the signature
        let blankCanvas = this.$refs.blank.getContext('2d')
        blankCanvas.fillStyle = "rgb(255,255,255)"
        blankCanvas.fillRect(0,0,this.signature.canvas.getBoundingClientRect().width,this.signature.canvas.getBoundingClientRect().height);
        this.blankSignature = this.$refs.blank.toDataURL();
        //
        
        this.signature.context = this.signature.canvas.getContext('2d')
        this.signature.context.strokeStyle = "#000000";
        this.signature.context.lineWidth = 5;
        this.signature.context.lineJoin = "round";
        this.signature.context.lineCap = "round";
        this.clearCan();
    },
    computed: {
        isSignatureBlank() {
            return this.blankSignature != this.signature_img
        }
    },

    methods: {
        //Draw signature 
        onDown(event){
            this.signature.mf = true;
            this.signature.ox = event.touches[0].pageX-event.target.getBoundingClientRect().left;
            this.signature.oy = event.touches[0].pageY-event.target.getBoundingClientRect().top;
            event.stopPropagation();
        },

        onMove(event){
            if(this.signature.mf){
                this.signature.x = event.touches[0].pageX - event.target.getBoundingClientRect().left;
                this.signature.y = event.touches[0].pageY - event.target.getBoundingClientRect().top;
                this.drawLine();
                this.signature.ox = this.signature.x;
                this.signature.oy = this.signature.y;
                event.preventDefault();
                event.stopPropagation();
            }
        },

        onUp(event){
            this.signature.mf = false;
            event.stopPropagation();
        },
        
        onMouseDown(event){
            this.signature.ox = event.clientX - event.target.getBoundingClientRect().left;
            this.signature.oy = event.clientY - event.target.getBoundingClientRect().top ;
            this.signature.mf = true;

        },
        
        onMouseMove(event){
            if(this.signature.mf){
                this.signature.x = event.clientX - event.target.getBoundingClientRect().left;
                this.signature.y = event.clientY - event.target.getBoundingClientRect().top ;
                this.drawLine();
                this.signature.ox = this.signature.x;
                this.signature.oy = this.signature.y;
            }
        },
        
        onMouseUp(event){
            this.signature.mf = false;
            this.signature_img = this.signature.canvas.toDataURL();
        },
        
        drawLine(){
            this.signature.context.beginPath();
            this.signature.context.moveTo(this.signature.ox,this.signature.oy);
            this.signature.context.lineTo(this.signature.x,this.signature.y);
            this.signature.context.stroke();
        },
        
        clearCan(){
            this.signature.context.fillStyle = "rgb(255,255,255)";
            this.signature.context.fillRect(0,0,this.signature.canvas.getBoundingClientRect().width,this.signature.canvas.getBoundingClientRect().height);
            this.signature_img = this.signature.canvas.toDataURL()
        },
        //

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
                signature: this.signature_img,
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
<style scoped>
    #candiv {
        border: solid 1px #000000;
        width: 302px;
    }
    canvas {
        display: block;
    }
</style>