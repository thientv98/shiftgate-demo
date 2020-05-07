<template>
    <div v-if="this.$store.state.auth.loggedIn"> 
  
        <div id="chat-circle" class="btn btn-raised" @click="showChatBox()">
            <div id="chat-overlay"></div>
                <!-- <i class="material-icons">speaker_phone</i> -->
            <i class="far fa-comment" style="font-size:25px"></i>
        </div>
  
        <div class="chat-box">
            <div class="chat-box-header">
            ChatBot
            <span class="chat-box-toggle" @click="hideChatBox()"><i class="material-icons">close</i></span>
            </div>
            <div class="chat-box-body">
                <div class="chat-box-overlay">   
                </div>
                <div class="chat-logs">
                    <div class="chat-msg user">
                        <span class="msg-avatar">
                            <img src="https://covidinspection.com/wp-content/uploads/2020/03/868320_people_512x512.png">
                        </span>
                        <div class="cm-msg-text" data-time="2020-5-5 17:10">Contact to shiftgate!</div>
                    </div>
                    <div class="chat-msg" :class="item.type" v-for="(item, index) in chat" :key="index">
                        <span class="msg-avatar">
                            <img src="https://covidinspection.com/wp-content/uploads/2020/03/868320_people_512x512.png">
                        </span>
                        <div class="cm-msg-text" :data-time="item.time">{{item.message}}</div>   
                    </div>
                </div><!--chat-log -->
            </div>
            <div class="chat-input">
                <form @submit.prevent="sendMessage()">  
                <!-- <input type="text" id="chat-input" placeholder="Send a message..." v-model="message" autocomplete="off"/> -->
                <textarea id="chat-input" placeholder="Send a message..." v-model="message"></textarea>
                <button type="submit" class="chat-submit" id="chat-submit" :disabled="message == ''"><i class="material-icons">send</i></button>  
                </form> 
            </div>
        </div>
    </div>
</template>

<script>
import JQuery from 'jquery'
let $ = JQuery
import moment from "moment";

export default {
    data () {
        return {
            message: '',
            chat: [],
        }
    },
    mounted() {
        let self = this
        $('#chat-input').keyup(function (event) { 
            if (event.keyCode == 13 && !event.shiftKey) {
                self.sendMessage()
            }
        })
    },
    methods: {
        fetchMessage() {
            try {
                this.$axios.get('getConversation').then(res => {
                    if (res.data.data.data.length > 0) {
                            res.data.data.data.forEach(message => {
                            if(message.participation.messageable_type.includes('User')){
                                this.sendMessage('admin',{id: message.id, body:message.body, time: message.created_at })
                            } else {
                                this.sendMessage('client',{id: message.id, body:message.body, time: message.created_at })
                            }
                        });
                    }
                });
            } catch (e) {
                console.log(e)
            }
        },
        showChatBox(){
            $("#chat-circle").toggle('scale')
            $(".chat-box").toggle('scale')
            $('#chat-input').focus()
            this.fetchMessage();
            

            let times = 0;
            let interval = setInterval(() => {
                try {
                    this.$axios.get('getConversation').then(res => {
                        if (res.data.data.data.length > 0 && res.data.data.data.length != this.chat.length) {
                            let newMessages = res.data.data.data.map(item => { return item.id })
                            let oldMessages = this.chat.map(item => { return item.id })
                            const difference = (a, b) => {
                                const s = new Set(b);
                                return a.filter(x => !s.has(x));
                            };

                            let newMessagesIds = newMessages.length > oldMessages.length ? difference(newMessages,oldMessages) : difference(oldMessages,newMessages)
                            
                            let updateMessages = [];
                            newMessagesIds.forEach(x => updateMessages.push(res.data.data.data.find(msg => msg.id == x)))
                            updateMessages.forEach(message => {
                                if(message.participation.messageable_type.includes('User')){
                                    this.sendMessage('admin',{id: message.id, body:message.body, time: message.created_at })
                                } else {
                                    this.sendMessage('client',{id: message.id, body:message.body, time: message.created_at })
                                }
                            });
                            times = 0
                        } 
                        times++
                        if(times == 60 && res.data.data.data.length == this.chat.length){ // loop 60times == 10 minutes
                            clearInterval(interval);
                            return;
                        }
                    });
                } catch (e) {
                    console.log(e)
                }
            }, 10000);
        },
        hideChatBox(){
            $('#chat-input').blur()
            $("#chat-circle").toggle('scale')
            $(".chat-box").toggle('scale') 
            this.chat = []
        },
        sendMessage(type,data){
            if(type == 'client'){
                this.chat.push({
                id: data.id,
                type: 'self',
                message: data.body,
                time: moment(data.time).format("YYYY/MM/DD HH:mm")
                })
            } else {
                this.chat.push({
                id: data.id,
                type: 'user',
                message: data.body,
                time: moment(data.time).format("YYYY/MM/DD HH:mm")
            })
            }
            this.message = ''
            this.scrollBottom()
            
            
        },
        scrollBottom(){
            $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
        },
    }
}
</script>