<!DOCTYPE html>

<html>
<head>

<title>Profile Settings</title>

<style>

body{
font-family:Arial, sans-serif;
background:#f4f6fb;
margin:0;
padding:50px;
}

/* CARD */

.profile-card{
width:650px;
margin:auto;
background:white;
padding:40px;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* TITLE */

.profile-card h2{
margin-top:0;
margin-bottom:30px;
}

/* AVATAR */

.avatar-section{
text-align:center;
margin-bottom:30px;
}

.avatar-circle{
width:120px;
height:120px;
border-radius:50%;
display:flex;
align-items:center;
justify-content:center;
background:#e5e7eb;
font-size:40px;
font-weight:bold;
color:#555;
margin:auto;
border:5px solid #f1f1f1;
overflow:hidden;
}

.avatar-circle img{
width:100%;
height:100%;
object-fit:cover;
}

/* IMAGE SIZE GUIDE */

.avatar-guide{
color:#888;
font-size:14px;
margin-top:10px;
}

/* INPUTS */

label{
font-weight:600;
font-size:14px;
display:block;
margin-top:10px;
}

input{
width:100%;
padding:12px;
margin-top:6px;
margin-bottom:18px;
border:1px solid #ddd;
border-radius:6px;
font-size:14px;
font-family:Arial, sans-serif;
box-sizing:border-box;
}

/* BIO TEXTAREA */

textarea{
width:100%;
padding:12px;
margin-top:6px;
margin-bottom:18px;
border:1px solid #ddd;
border-radius:6px;
font-size:14px;
font-family:Arial, sans-serif;
line-height:1.6;
min-height:120px;
resize:vertical;
box-sizing:border-box;
}

/* BUTTON */

.btn{
background:#16a34a;
color:white;
border:none;
padding:12px 22px;
border-radius:6px;
cursor:pointer;
font-size:15px;
}

.btn:hover{
background:#15803d;
}

</style>

</head>

<body>

<div class="profile-card">

<h2>Profile Settings</h2>

<div class="avatar-section">

<div class="avatar-circle">

@if(Auth::user()->avatar) <img src="{{ asset('storage/'.Auth::user()->avatar) }}">
@else
{{ strtoupper(substr(Auth::user()->name,0,1)) }}
@endif

</div>

<p class="avatar-guide">Recommended size: 200 × 200 px (square image works best)</p>

<form method="POST" action="/update-avatar" enctype="multipart/form-data">
@csrf

<input type="file" name="avatar" id="avatarInput" style="display:none" onchange="this.form.submit()">

<br>

<button type="button" class="btn" onclick="document.getElementById('avatarInput').click()">
Update Profile Photo
</button>

</form>

</div>

<form method="POST" action="/update-profile">
@csrf

<label>Name</label> <input type="text" name="name" value="{{ Auth::user()->name }}">

<label>Email</label> <input type="email" name="email" value="{{ Auth::user()->email }}">

<label>New Password</label> <input type="password" name="password" placeholder="Leave empty if you don't want to change">

<label>Profile Bio</label>

<textarea name="bio">{{ Auth::user()->bio }}</textarea>

<button class="btn">Save Changes</button>

</form>

</div>

</body>
</html>
