<h1>{{ $service->title }}</h1>

<p>{{ $service->description }}</p>

<h3>$ {{ $service->price }}</h3>

<br>

<form action="/order/{{ $service->id }}" method="POST">

@csrf

<label style="font-weight:bold;">Project Requirements</label>

<br><br>

<textarea
name="requirements"
placeholder="Describe what you need for this service..."
style="width:100%;max-width:500px;height:120px;padding:10px;border:1px solid #ccc;border-radius:6px;"
required>
</textarea>

<br><br>

<button
type="submit"
style="padding:10px 20px;background:green;color:white;border:none;border-radius:5px;cursor:pointer;">
Order Now
</button>

</form>

<br><br>

<a href="/services">Back to Services</a>
