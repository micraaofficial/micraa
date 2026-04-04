@extends('layouts.app')

@section('content')

<div style="max-width:700px;margin:50px auto;background:#fff;padding:30px;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,0.08);">

    <h2 style="font-size:22px;font-weight:600;margin-bottom:25px;">
        Create Service
    </h2>

    <form method="POST" action="/create-taskbit" enctype="multipart/form-data">
    @csrf

    <!-- TITLE -->
    <div style="margin-bottom:20px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Title</label>
        <input type="text" name="title" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;">
    </div>

    <!-- DESCRIPTION -->
    <div style="margin-bottom:20px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Description</label>
        <textarea name="description" style="width:100%;height:120px;padding:10px;border:1px solid #ddd;border-radius:6px;"></textarea>
    </div>

    <!-- PRICE -->
    <div style="margin-bottom:20px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Price ($)</label>
        <input type="number" name="price" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;">
    </div>

    <!-- DELIVERY -->
    <div style="margin-bottom:20px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Delivery Time (days)</label>
        <input type="number" name="delivery_time" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;">
    </div>

    <!-- IMAGE -->
    <div style="margin-bottom:20px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Service Image</label>
        <input type="file" name="image1">
    </div>

    <!-- TAGS -->
    <div style="margin-bottom:25px;">
        <label style="display:block;margin-bottom:6px;font-weight:500;">Tags (5 required)</label>
        <input type="text" name="tags" placeholder="design,logo,web,fast,pro" style="width:100%;padding:10px;border:1px solid #ddd;border-radius:6px;">
    </div>

    <button style="background:#16a34a;color:white;padding:10px 20px;border:none;border-radius:6px;font-weight:500;">
        Create Service
    </button>

    </form>

</div>

@endsection
