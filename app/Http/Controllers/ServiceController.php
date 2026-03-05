<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function create()
    {
        return view('create-service');
    }

    public function store(Request $request)
    {
        Service::create([
            'user_id' => 1,
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'status' => 'active'
        ]);

        return redirect('/');
    }
}
