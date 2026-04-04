<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Become Seller | Micraa</title>

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

/* LOGO */

.logo img{
height:55px;
width:auto;
margin-bottom:6px;
}

/* TITLE */

.subtitle{
font-size:20px;
font-weight:500;
}

/* FORM */

.card-body{
padding:30px;
}

.input-group{
position:relative;
margin-bottom:14px;
}

input{
width:100%;
padding:13px 40px 13px 13px;
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
color:#777;
font-size:16px;
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
margin-top:6px;
}

button:hover{
background:#18a964;
}

</style>

</head>

<body>

<div class="card">

<div class="card-header">

<div class="logo">
<img src="<?php echo e(asset('images/logo.svg')); ?>" alt="Micraa Logo">
</div>

<div class="subtitle">Become Seller</div>

</div>

<div class="card-body">

<form method="POST" action="/seller/register" autocomplete="off">

<?php echo csrf_field(); ?>

<div class="input-group">
<input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="input-group">
<input type="email" name="email" placeholder="Email Address" autocomplete="off" required>
</div>

<div class="input-group">
<input type="password" id="password" name="password" placeholder="Password" autocomplete="new-password" required>
<span class="eye" onclick="togglePassword()">👁</span>
</div>

<div class="input-group">
<input type="text" name="skill" placeholder="Skill (Example: Logo Design)" required>
</div>

<div class="input-group">
<input type="text" name="country" placeholder="Country" required>
</div>

<button type="submit">
Create Seller Account
</button>

</form>

</div>

</div>

<script>

function togglePassword(){
let p=document.getElementById("password");

if(p.type==="password"){
p.type="text";
}else{
p.type="password";
}

}

</script>

</body>
</html>
<?php /**PATH /home/u178846379/domains/micraa.com/public_html/resources/views/seller/register.blade.php ENDPATH**/ ?>