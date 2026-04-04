<!DOCTYPE html>

<html>
<head>

<title>Micraa Dashboard</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
margin:0;
font-family:'Inter',sans-serif;
background:#f5f5f5;
}

/* TOP BAR */

.topbar{
height:60px;
background:#0b4d23;
display:flex;
align-items:center;
justify-content:space-between;
padding:0 30px;
color:white;
}

.logo img{
height:38px;
}

.profile{
display:flex;
align-items:center;
gap:10px;
}

/* AVATAR IMAGE */
.avatar-img{
width:40px;
height:40px;
border-radius:50%;
object-fit:cover;
}

/* AVATAR FALLBACK */
.avatar-letter{
width:40px;
height:40px;
border-radius:50%;
background:white;
display:flex;
align-items:center;
justify-content:center;
font-weight:600;
color:#333;
}

/* LAYOUT */

.layout{
display:flex;
}

/* SIDEBAR */

.sidebar{
width:200px;
background:white;
min-height:calc(100vh - 60px);
border-right:1px solid #eee;
padding-top:20px;
}

.sidebar-link{
display:block;
padding:14px 25px;
text-decoration:none;
color:#444;
font-size:16px;
font-weight:500;
background:none;
border:none;
width:100%;
text-align:left;
cursor:pointer;
}

.sidebar-link:hover{
background:#f3f3f3;
}

.logout-btn{
color:#e74c3c;
}

.logout-btn:hover{
color:#c0392b;
}

/* CONTENT */

.content{
flex:1;
padding:30px;
}

.page-title{
font-size:28px;
font-weight:700;
margin-bottom:25px;
}

/* CARDS */

.cards{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
}

.card{
background:white;
border-radius:10px;
padding:20px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.card-title{
font-size:16px;
color:#777;
margin-bottom:10px;
}

.card-number{
font-size:38px;
font-weight:700;
color:#1DBF73;
}

</style>

</head>

<body>

<div class="topbar">

<div class="logo">
<img src="{{ asset('images/logo.svg') }}">
</div>

<div class="profile">

{{-- ✅ FIXED AVATAR --}}
@if(Auth::check() && Auth::user()->avatar)
    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" class="avatar-img">
@else
    <div class="avatar-letter">
        {{ Auth::check() ? strtoupper(substr(Auth::user()->name,0,1)) : 'U' }}
    </div>
@endif

<span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>

</div>

</div>

<div class="layout">

<div class="sidebar">

<a class="sidebar-link" href="/">Home</a>

<a class="sidebar-link" href="/create-taskbit">Create Taskbit</a>

<a class="sidebar-link" href="/my-taskbit">My Taskbits</a>

<a class="sidebar-link" href="/messages">Messages</a>

<a class="sidebar-link" href="/settings">Settings</a>

<a class="sidebar-link" href="/earnings">Earnings</a>

<form method="POST" action="/logout">
@csrf
<button type="submit" class="sidebar-link logout-btn">Log Out</button>
</form>

</div>

<div class="content">

<div class="page-title">Dashboard</div>

<div class="cards">

<div class="card">
<div class="card-title">Total Listings</div>
<div class="card-number">{{ $totalListings }}</div>
</div>

<div class="card">
<div class="card-title">Messages</div>
<div class="card-number">0</div>
</div>

<div class="card">
<div class="card-title">Views</div>
<div class="card-number">0</div>
</div>

<div class="card">
<div class="card-title">Earnings</div>
<div class="card-number">$ {{ $earnings ?? 0 }}</div>
</div>

</div>

</div>

</div>

</body>
</html>
