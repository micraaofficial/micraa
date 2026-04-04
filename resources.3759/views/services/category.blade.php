@extends('layouts.app')

@section('content')

<div style="max-width:1200px;margin:auto;padding:40px">

@foreach($services as $service)

<div style="border:1px solid #eee;padding:15px;margin-bottom:10px">

<h3>{{ $service->title }}</h3>

<p>Price: ${{ $service->price }}</p>

</div>

@endforeach

</div>

@endsection
