<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">Chat</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>

        <v-card class="mt-5 form-data wrapper-content" flat tile="">

            <v-card-actions class="pa-4">
                <v-subheader class="font-weight-bold">Chat</v-subheader>
            </v-card-actions>

            <v-divider></v-divider>

            <v-card-text>

                <v-row>
                    <v-col cols="12">
                        <div class="settings-tray">
                            <div class="friend-drawer no-gutters friend-drawer--grey">
                            <img class="profile-image" src="https://covidinspection.com/wp-content/uploads/2020/03/868320_people_512x512.png" alt="">
                            <div class="text">
                            <h6>Customer 1</h6>
                            <p class="text-muted">Layin' down the law since like before Christ...</p>
                            </div>
                            <!-- <span class="settings-tray--right">
                            <i class="material-icons">cached</i>
                            <i class="material-icons">message</i>
                            <i class="material-icons">menu</i>
                            </span> -->
                        </div>
                        </div>
                        <div class="chat-panel">
                        <div class="chat-history">
                            <div class="row no-gutters" v-for="(item, index) in chat" :key="index">
                                <div class="col-md-5" :class="item.type == 'right' ? 'offset-md-7' : ''">
                                    <div class="chat-bubble" :class="item.type == 'left' ? 'chat-bubble--left' : 'chat-bubble--right'" 
                                    :data-time="item.time">{{item.message}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 pb-0">
                            <div class="chat-box-tray">
                                <form @submit.prevent="sendMessage()" autocomplete="off" class="d-inline-flex">
                                <textarea id="chat-input" type="text" placeholder="Type your message here..." v-model="message" autocomplete="off"></textarea>
                                <!-- <i class="material-icons">mic</i> -->
                                <button type="submit" :disabled="message == ''"><i class="material-icons">send</i></button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </v-col>
                </v-row>

            </v-card-text>

            <v-divider></v-divider>

        </v-card>

    </v-container>
</template>

<script>
import JQuery from 'jquery'
let $ = JQuery

export default {
    data() {
        return {
            message: '',
            chat: [
                {
                    type: 'left',
                    message: 'abc',
                    time: "2020-5-5 17:10"
                },
                {
                    type: 'right',
                    message: 'bcd',
                    time: "2020-5-5 17:10"
                }
            ],
            breadcrumbs: [
                {
                    text: 'Home',
                    disabled: false,
                    href: '/',
                },
                {
                    text: 'chat',
                    href: '/chat',
                },
                {
                    text: '編集',
                    href: '',
                }
            ],
        };
    },
    mounted(){
      let self = this
      $('#chat-input').keyup(function (event) { 
          if (event.keyCode == 13 && !event.shiftKey) {
              event.preventDefault()
              self.sendMessage()
          }
      })
    },
    methods: {
        sendMessage(){
            let today = new Date()
            let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()
            let time = today.getHours() + ":" + today.getMinutes()
            let dateTime = date+' '+time
            this.chat.push({
                type: 'right',
                message: this.message,
                time: dateTime
            })
            this.message = ''
            this.scrollBottom()
        },
        scrollBottom(){
            $(".chat-history").stop().animate({ scrollTop: $(".chat-history")[0].scrollHeight}, 1000);
        }
    },
} 
</script>

<style scoped lang="scss">
$blue: #74b9ff;



.profile-image {
  width: 50px;
  height: 50px;
  border-radius: 40px;
}

.settings-tray {
  background: #eee;
  padding: 10px 15px;
  
  .no-gutters {
    padding: 0;
  }
  
  &--right {
    float: right;
    
    i {
      margin-top: 10px;
      font-size: 25px;
      color: grey;
      margin-left: 14px;
      transition: .3s;
      
      &:hover {
        color: $blue;
        cursor: pointer;
      }
    }
  }
}

.search-box {
  background: #fafafa;
  padding: 10px 13px;
  
  .input-wrapper {
    background: #fff;
    border-radius: 40px;
    
    i {
      color: grey;
      margin-left: 7px; 
      vertical-align: middle;
    }
  }
}

textarea {
  border: none;
  border-radius: 30px;
  width: calc(100% - 65px);

  &::placeholder {
    color: #e3e3e3;
    font-weight: 300;
    margin-left: 20px;
  }

  &:focus {
    outline: none;
  }
}

.friend-drawer {
  padding: 10px 15px;
  display: flex;
  vertical-align: baseline;
  background: #fff;
  transition: .3s ease;
  
  &--grey {
    background: #eee;
  }
  
  .text {
    margin-left: 12px;
    width: 70%;
    
    h6 {
      margin-top: 6px;
      margin-bottom: 0;
      font-size: 20px;
    }
    
    p {
      margin: 0;
    }
  }
  
  .time {
    color: grey;
  }
  
  &--onhover:hover {
    background: $blue;
    cursor: pointer;
    
    p,
    h6,
    .time {
      color: #fff !important;
    }
  }
}

.chat-bubble {
  padding: 10px 14px;
  background: #eee;
  margin: 10px 30px;
  border-radius: 9px;
  position: relative;
  animation: fadeIn 1s ease-in;
  white-space: pre-wrap;
  
  &:after {
    content: '';
    position: absolute;
    top: 50%;
    width: 0;
    height: 0;
    border: 20px solid transparent;
    border-bottom: 0;
    margin-top: -10px;
  }
  
  &--left {
     &:after {
      left: 0;
      border-right-color: #eee;
	    border-left: 0;
      margin-left: -20px;
    }
  }
  
  &--right {
    &:after {
      right: 0;
      border-left-color: $blue;
	    border-right: 0;
      margin-right: -20px;
    }
  }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}


.offset-md-7 {
  .chat-bubble {
    background: $blue;
    color: #fff;
  }
}

.chat-box-tray {
  background: #eee;
  display: flex;
  align-items: baseline;
  padding: 10px 15px;
  align-items: center;
  margin-top: 19px;
  bottom: 0;
    form{
        width: 100%;
    }
    textarea {
        margin: 0 10px;
        padding: 6px 15px;
        background-color: white;
        resize: none;
        &::placeholder{
            color: gray;
        }
        &::placeholder {
            transform: translateY(11px);
            text-align: center;
        }
    }
  
    i {
        color: #74b9ff;
        font-size: 30px;
        vertical-align: middle;
        
        
    }
}
.chat-panel{
    border: 1px solid #eeeeee;
    border-top: 0px;
    border-bottom: 0px;
}
.chat-bubble.chat-bubble--left::before {
    content: attr(data-time);
    position: absolute;
    left: 0px;
    bottom: -20px;
    display: block;
    font-size: .750rem;
    color: rgba(84, 110, 122,1.0);
}
.chat-bubble.chat-bubble--right::before {
    content: attr(data-time);
    position: absolute;
    right: 0px;
    bottom: -20px;
    display: block;
    font-size: .750rem;
    color: rgba(84, 110, 122,1.0);
}
.chat-history{
    height: 300px;
    overflow: hidden auto;
}
</style>