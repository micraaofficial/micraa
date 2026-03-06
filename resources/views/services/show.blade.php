<h1>{{ $service->title }}</h1>

<p>{{ $service->description }}</p>

<h3>$ {{ $service->price }}</h3>

<br>

<form action="/order/{{ $service->id }}" method="POST">
    @csrf

    <button style="padding:10px 20px;background:green;color:white;border:none;">
        Order Now
    </button>

</form>

<br><br>

<a href="/services">Back to Services</a>
