@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-8">
    <h3 class=" text-center">Messaging</h3>
<div class="messaging">
  <div class="inbox_msg">
    <div class="inbox_people">
      <div class="headind_srch">
        <div class="recent_heading">
          <h4>Recent</h4>
        </div>
        <div class="srch_bar">
          <div class="stylish-input-group">
            <input type="text" class="search-bar"  placeholder="Search" >
            <span class="input-group-addon">
              <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </span> 
          </div>
        </div>
      </div>
      <div class="inbox_chat">
        <div class="chat_list active_chat" v-for="user in users"  :key="user.id" v-if="user.id != userId" @click="fetchMessages(user.id)" :color="(user.id==-friend) ? 'green' :''">
          <div class="chat_people">
            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            <div class="chat_ib">
              <h5>@{{user.name}} <span class="chat_date">Dec 25</span></h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mesgs">
      <div class="msg_history">
        <div :class="(userId===message.user_id ? 'outgoing_msg' : '')" v-for="(message, index) in allMessages">
          <div :class=" (userId==message.user_id ? 'sent_msg' : '')">
            <p>@{{message.message}}</p>
          </div>
        </div>
      </div>
      <div class="type_msg">
        <div class="input_msg_write">
          <input type="text" class="write_msg form-control" placeholder="Type a message" v-model="message" @keyup.enter="sendMessage" />
          <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true" @click="sendMessage" ></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">
  const app=new Vue({
    el:'#app',
    data:{
      message:null,
      allMessages:{},
      userId:{!!Auth::id()!!},
      users:{},
      friend:null
    },
    mounted(){

      this.listen();
      this.fetchUsers();

    },
    methods:{
      sendMessage(){
        if (!this.message) {
          return alert('Please Enter Message');
        }

        axios.post('/private-messages/'+this.friend,{message:this.message})
        .then(response =>{
          this.allMessages.push(response.data.message);
          this.message='';



        });

      },

      fetchMessages(recieverId){
        this.friend=recieverId;
        axios.get('/private-messages/'+recieverId)
        .then(response =>{
         this.allMessages = response.data;

       });
      },
      fetchUsers(){
        axios.get('/users')
        .then(response => {
          this.users=response.data
        })
      },
      listen(){
        Echo.private('privatechat.'+this.userId)
        .listen('PrivateMessageSent',(e)=>{
          this.allMessages.push(e.message)
        })
      }

    }
  })
</script>

@endsection