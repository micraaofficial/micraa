<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sign Up | Micraa</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
font-family:'Inter',sans-serif;
background:#f3f3f3;
margin:0;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

/* CARD */

.card{
width:500px;
background:white;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
overflow:hidden;
}

/* HEADER */

.card-header{
background:#0b4d23;
color:white;
text-align:center;
padding:28px 20px;
}

.logo img{
height:55px;
}

.subtitle{
font-size:20px;
font-weight:500;
margin-top:5px;
}

/* FORM */

.card-body{
padding:35px;
}

.input-group{
position:relative;
margin-bottom:15px;
}

input{
width:100%;
padding:13px;
border:1px solid #ddd;
border-radius:6px;
font-size:14px;
background:#fafafa;
box-sizing:border-box;
}

input:focus{
outline:none;
border-color:#1DBF73;
background:white;
}

/* PASSWORD EYE */

.eye{
position:absolute;
right:12px;
top:50%;
transform:translateY(-50%);
cursor:pointer;
color:#666;
}

/* BUTTON */

button{
background:#1DBF73;
color:white;
border:none;
padding:13px;
width:100%;
border-radius:6px;
font-size:15px;
font-weight:600;
cursor:pointer;
margin-top:10px;
}

button:hover{
background:#18a964;
}

/* GOOGLE BUTTON */

.google-btn{
display:flex;
align-items:center;
justify-content:center;
gap:10px;
width:100%;
padding:12px;
border:1px solid #ddd;
border-radius:6px;
background:white;
color:#444;
font-weight:500;
text-decoration:none;
margin-top:12px;
}

.google-btn img{
width:18px;
height:18px;
}

.google-btn:hover{
background:#f7f7f7;
}

/* LOGIN LINK */

.login{
text-align:center;
margin-top:18px;
font-size:14px;
}

.login a{
color:#1DBF73;
text-decoration:none;
font-weight:500;
}

</style>

</head>

<body>

<div class="card">

<div class="card-header">

<div class="logo">
<img src="{{ asset('images/logo.svg') }}" alt="Micraa Logo">
</div>

<div class="subtitle">Sign Up</div>

</div>

<div class="card-body">

<form method="POST" action="{{ route('register') }}">

@csrf

<div class="input-group">
<input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Email Address" required>
</div>

<div class="input-group">
<input type="password" id="password" name="password" placeholder="Password" required>
<span class="eye" onclick="togglePassword('password')">👁</span>
</div>

<div class="input-group">
<input type="password" id="confirm_password" name="password_confirmation" placeholder="Confirm Password" required>
<span class="eye" onclick="togglePassword('confirm_password')">👁</span>
</div>

<button type="submit">Sign Up</button>

</form>

<a href="/auth/google" class="google-btn">
<img src="https://developers.google.com/identity/images/g-logo.png">
Continue with Google
</a>

<div class="login">
Already have an account? <a href="/login">Log in</a>
</div>

</div>

</div>

<script>

function togglePassword(id){

let p=document.getElementById(id);

if(p.type==="password"){
p.type="text";
}else{
p.type="password";
}

}

</script>

</body>
</html>
