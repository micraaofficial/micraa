<!DOCTYPE html>
<html>
<head>
<title>Messages - Micraa</title>

<style>

body{
font-family:Arial;
margin:0;
background:#f5f5f5;
}

/* MAIN LAYOUT */

.container{
display:flex;
height:100vh;
}

/* LEFT SIDEBAR */

.sidebar{
width:260px;
background:white;
border-right:1px solid #ddd;
overflow-y:auto;
}

.sidebar h3{
padding:15px;
margin:0;
border-bottom:1px solid #eee;
}

.chat-user{
padding:15px;
border-bottom:1px solid #eee;
cursor:pointer;
}

.chat-user:hover{
background:#f7f7f7;
}

.chat-user strong{
display:block;
}

/* CHAT AREA */

.chat-area{
flex:1;
display:flex;
flex-direction:column;
background:white;
}

.chat-header{
padding:15px;
border-bottom:1px solid #eee;
font-weight:bold;
}

.chat-body{
flex:1;
padding:20px;
overflow-y:auto;
background:#fafafa;
}

.message{
margin-bottom:15px;
}

.message.me{
text-align:right;
}

.bubble{
display:inline-block;
padding:10px 14px;
border-radius:10px;
max-width:60%;
}

.me .bubble{
background:#1dbf73;
color:white;
}

.other .bubble{
background:#e4e6eb;
}

/* INPUT */

.chat-input{
padding:15px;
border-top:1px solid #eee;
}

.chat-input form{
display:flex;
}

.chat-input input{
flex:1;
padding:10px;
border:1px solid #ddd;
border-radius:5px;
}

.chat-input button{
margin-left:10px;
padding:10px 20px;
border:none;
background:#1dbf73;
color:white;
border-radius:5px;
cursor:pointer;
}

/* RIGHT PANEL */

.info-panel{
width:260px;
background:white;
border-left:1px solid #ddd;
padding:20px;
}

</style>
</head>

<body>

<div class="container">

<!-- LEFT USERS -->

<div class="sidebar">

<h3>All Messages</h3>

@foreach($users as $user)

<div class="chat-user">
<strong>{{ $user->name }}</strong>
<span>Click to chat</span>
</div>

@endforeach

</div>


<!-- CHAT -->

<div class="chat-area">

<div class="chat-header">
Chat
</div>

<div class="chat-body">

@foreach($messages as $msg)

<div class="message {{ $msg->sender_id == auth()->id() ? 'me' : 'other' }}">
<div class="bubble">
{{ $msg->message }}
</div>
</div>

@endforeach

</div>


<div class="chat-input">

<form method="POST" action="/send-message">
@csrf

<input type="hidden" name="receiver_id" value="1">

<input type="text" name="message" placeholder="Type a message..." required>

<button type="submit">Send</button>

</form>

</div>

</div>


<!-- RIGHT PANEL -->

<div class="info-panel">

<h3>User Info</h3>

<p>Select a user to see details.</p>

</div>

</div>

</body>
</html>
