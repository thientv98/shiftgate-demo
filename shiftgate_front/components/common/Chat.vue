<template>
<div @blur="hideChatBox()"> 
  
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
                <div class="cm-msg-text" data-time="12:30">Contact to shiftgate!</div>
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
        <form @submit.prevent="sendMessage()" autocomplete="off">  
        <input type="text" id="chat-input" placeholder="Send a message..." v-model="message" autocomplete="off"/>
        <button type="submit" class="chat-submit" id="chat-submit" :disabled="message == ''"><i class="material-icons">send</i></button>  
        </form> 
    </div>
  </div>
  
  
  
  
</div>
    </div>
</template>

<script>
import JQuery from 'jquery'
let $ = JQuery

export default {
    data () {
        return {
            message: '',
            chat: [
                {
                    type: 'self',
                    message: 'aamama mamamam',
                    time: "16:30"
                }
            ]
        }
    },
    methods: {
        showChatBox(){
            $("#chat-circle").toggle('scale')
            $(".chat-box").toggle('scale')
            $('#chat-input').focus()
        },
        hideChatBox(){
            $('#chat-input').blur()
            $("#chat-circle").toggle('scale')
            $(".chat-box").toggle('scale') 
        },
        sendMessage(){
            this.chat.push({
                type: 'self',
                message: this.message
            })
            this.message = ''
            this.scrollBottom()
        },
        scrollBottom(){
            $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
        }
    }
}
</script>