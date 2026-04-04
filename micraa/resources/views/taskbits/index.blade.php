<h1 style="text-align:center; font-size:40px; margin-top:40px;">Micraa</h1>

<form method="GET" action="/" style="text-align:center; margin:40px 0;">

<input
type="text"
name="search"
placeholder="Search services..."
style="
width:500px;
padding:14px 20px;
border-radius:50px;
border:1px solid #ccc;
outline:none;
font-size:16px;
">

<button
type="submit"
style="
padding:12px 20px;
border-radius:50px;
border:none;
background:black;
color:white;
cursor:pointer;
margin-left:10px;
">
Search </button>

</form>

<!-- HERO BANNER -->

<div style="
width:1000px;
margin:auto;
background:linear-gradient(90deg,#ff7a18,#ffb347);
padding:60px 20px;
text-align:center;
color:white;
border-radius:12px;
margin-bottom:40px;
">

<h2 style="font-size:36px; margin-bottom:10px;">
Start selling your skills on Micraa
</h2>

<p style="font-size:18px; margin-bottom:20px;">
Offer micro services starting from $1
</p>

<a href="/taskbits/create"
style="
background:white;
color:black;
padding:12px 24px;
border-radius:30px;
text-decoration:none;
font-weight:bold;
">
Create Your First Service </a>

</div>

<!-- CATEGORIES -->

<div style="width:1000px; margin:auto; margin-bottom:40px; text-align:center;">

<h2 style="margin-bottom:20px;">Browse Categories</h2>

<div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap;">

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">AI Services</span>

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">Graphic Design</span>

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">Video Editing</span>

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">Programming</span>

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">SEO</span>

<span style="padding:10px 20px; border:1px solid #ddd; border-radius:20px;">Writing</span>

</div>

</div>

<div style="width:1000px; margin:auto;">

<hr style="margin:20px 0;">

<div style="display:flex; flex-wrap:wrap; gap:20px;">

@foreach($taskbits as $taskbit)

<div style="
width:300px;
border:1px solid #ddd;
border-radius:10px;
padding:15px;
box-shadow:0 2px 8px rgba(0,0,0,0.05);
">

@if($taskbit->image) <img src="/storage/{{ $taskbit->image }}" style="width:100%; border-radius:8px;">
@endif

<h3 style="margin-top:10px;">
<a href="/taskbits/{{ $taskbit->slug }}" style="text-decoration:none; color:black;">
{{ $taskbit->title }}
</a>
</h3>

<p style="color:#555;">
{{ $taskbit->description }}
</p>

<p style="margin-top:10px;">
<strong>Price:</strong> ${{ $taskbit->price }}
</p>

<p>
<strong>Delivery:</strong> {{ $taskbit->delivery_time }} days
</p>

</div>

@endforeach

</div>

</div>
