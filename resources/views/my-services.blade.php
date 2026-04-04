<!DOCTYPE html>
<html>
<head>

<title>My Taskbit</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
margin:0;
padding:40px;
}

.card{
width:900px;
margin:auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.title{
font-size:24px;
font-weight:bold;
margin-bottom:20px;
}

.service-row{
display:flex;
align-items:center;
justify-content:space-between;
padding:15px 0;
border-bottom:1px solid #eee;
}

.service-left{
display:flex;
align-items:center;
gap:15px;
}

.thumb{
width:90px;
height:65px;
border-radius:6px;
object-fit:cover;
border:1px solid #eee;
background:#f0f0f0;
}

.service-info{
line-height:1.4;
}

.service-title{
font-weight:bold;
font-size:15px;
}

.price{
color:#16a34a;
font-weight:bold;
margin-top:4px;
}

/* TAGS */
.tags{
margin-top:6px;
}

.tag{
display:inline-block;
background:#e5e7eb;
padding:4px 8px;
border-radius:6px;
font-size:12px;
margin-right:5px;
margin-top:4px;
}

.actions a{
margin-left:10px;
text-decoration:none;
font-size:14px;
}

.edit{
color:#2563eb;
}

.delete{
color:red;
}

.dashboard-btn{
display:inline-block;
margin-top:30px;
background:#16a34a;
color:white;
padding:10px 18px;
border-radius:6px;
text-decoration:none;
font-weight:600;
}

</style>

</head>

<body>

<div class="card">

<div class="title">My Taskbit</div>

@foreach($services as $service)

<div class="service-row">

<div class="service-left">

<img class="thumb"
src="{{ $service->image1 && file_exists(public_path('storage/'.$service->image1))
? asset('storage/'.$service->image1)
: asset('images/default-avatar.png') }}">

<div class="service-info">

<div class="service-title">
{{ $service->title }}
</div>

<div class="price">
$ {{ $service->price }}
</div>

{{-- TAGS SHOW (optional but ready) --}}
@if($service->tags)
<div class="tags">
@foreach(explode(',', $service->tags) as $tag)
<span class="tag">{{ $tag }}</span>
@endforeach
</div>
@endif

</div>

</div>

<div class="actions">

<a class="edit" href="/edit-taskbit/{{ $service->id }}">Edit</a>

<a class="delete" href="/delete-service/{{ $service->id }}">Delete</a>

</div>

</div>

@endforeach

<div style="text-align:center;">

<a class="dashboard-btn" href="/dashboard">
Go to Dashboard
</a>

</div>

</div>

</body>
</html>
