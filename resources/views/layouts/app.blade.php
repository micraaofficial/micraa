@php
$categories = \App\Models\Category::with('subcategories.microcategories')->get();
@endphp

<!DOCTYPE html>
<html>
<head>
<title>Micraa</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>

    input, textarea {
    position: relative;
    z-index: 10;
}

body{
font-family:Arial;
margin:0;
}

.topbar{
background:#0b4d23;
height:60px;
display:flex;
align-items:center;
justify-content:space-between;
padding:0 30px;
color:white;
}

.topbar img{
height:36px;
}

.mega-right{
display:grid;
grid-template-columns:repeat(5,1fr); /* 5 columns */
gap:30px;
position:absolute;
top:60px;
left:0;
width:100%;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
z-index:999;
}

/* Each column */
.menu-column h4{
font-size:16px;
margin-bottom:10px;
font-weight:600;
}

.menu-column a{
display:block;
font-size:14px;
color:#444;
text-decoration:none;
margin-bottom:8px;
}

.menu-column a:hover{
color:#16a34a;
}

.micro-card{
text-decoration:none;
color:#333;
text-align:center;
font-size:14px;
}

.micro-card img{
width:70px;
height:70px;
object-fit:cover;
display:block;
margin:auto;
margin-bottom:6px;
}
</style>

</head>

<body>

<!-- TOP HEADER -->
<div class="topbar">
    <a href="/">
        <img src="{{ asset('images/logo.svg') }}">
    </a>

    <div>
        <a href="/seller/register" style="color:white;text-decoration:none;font-weight:bold;">
            Become a Seller
        </a>
    </div>
</div>

<!-- MEGA MENU SAFE -->
@if(isset($categories))

<div id="megaMenu" class="mega-right" style="display:none;">

    @foreach($categories as $category)

        <div class="menu-column">

            <h4>{{ $category->name }}</h4>

            @foreach($category->subcategories as $sub)

                @foreach($sub->microcategories as $micro)

                    <a href="/{{ $category->slug }}/{{ $sub->slug }}/{{ $micro->slug }}">
                        {{ $micro->name }}
                    </a>

                @endforeach

            @endforeach

        </div>

    @endforeach

</div>

@endif

<!-- PAGE CONTENT -->
<main>
@yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
