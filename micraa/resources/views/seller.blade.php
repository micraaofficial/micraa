<!DOCTYPE html>
<html>

<head>
<title>Become Seller - Micraa</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
margin:0;
}

/* CONTAINER */

.box{
width:600px;
margin:120px auto;
background:white;
padding:50px;
border-radius:12px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

/* TITLE */

h1{
margin-bottom:10px;
}

/* TEXT */

p{
color:#666;
font-size:16px;
}

/* BUTTON */

.start-btn{
background:#1dbf73;
color:white;
border:none;
padding:14px 28px;
font-size:16px;
border-radius:6px;
cursor:pointer;
text-decoration:none;
display:inline-block;
margin-top:20px;
}

.start-btn:hover{
background:#19a463;
}

</style>

</head>

<body>

<div class="box">

<h1>Start Selling on Micraa</h1>

<p>Create Taskbits and start earning from your skills.</p>

@if(auth()->check())

<a href="/create-service" class="start-btn">
Create Your First Taskbit
</a>

@else

<a href="/login" class="start-btn">
Login to Start Selling
</a>

@endif

</div>

</body>
</html>
