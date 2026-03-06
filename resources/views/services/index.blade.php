<h1>All Services</h1>

<a href="/create-service">Post a Service</a>

<hr>

@foreach($services as $service)

<div style="border:1px solid #ccc;padding:15px;margin:10px;">

<h3>
<a href="/service/{{ $service->slug }}">
{{ $service->title }}
</a>
</h3>

<p>{{ $service->description }}</p>

<strong>$ {{ $service->price }}</strong>

</div>

@endforeach
