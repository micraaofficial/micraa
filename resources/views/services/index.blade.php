<h1>Marketplace Services</h1>

@foreach($services as $service)

<div style="border:1px solid #ddd;padding:15px;margin-bottom:20px;width:300px;">

@if($service->image)
<img src="/{{ $service->image }}" width="300">
@endif

<h3>
<a href="/service/{{ $service->slug }}">
{{ $service->title }}
</a>
</h3>

<p>${{ $service->price }}</p>

<a href="/service/{{ $service->slug }}">
<button>View Service</button>
</a>

</div>

@endforeach
