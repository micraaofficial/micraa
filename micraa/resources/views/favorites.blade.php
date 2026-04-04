<!DOCTYPE html>

<html>
<head>

<title>My Favorites</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
padding:40px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
margin-bottom:20px;
}

img{
width:200px;
border-radius:6px;
}

</style>

</head>

<body>

<h2>My Favorite Gigs</h2>

@foreach($favorites as $favorite)

<div class="card">

<img src="{{ asset('storage/'.$favorite->service->image1) }}">

<h3>{{ $favorite->service->title }}</h3>

<p>Price: ${{ $favorite->service->price }}</p>

</div>

@endforeach

</body>
</html>
