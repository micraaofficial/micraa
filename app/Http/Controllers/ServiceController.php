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
        $imagePath = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $filename = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('services'), $filename);

            $imagePath = 'services/'.$filename;
        }

        Service::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => \Str::slug($request->title).'-'.time(),
            'description' => $request->description,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time ?? 1,
            'image' => $imagePath,
            'status' => 'active'
        ]);

        return redirect('/seller/dashboard');
    }
}
