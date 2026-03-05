<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class TaskbitController extends Controller
{
    public function index()
    {
        $taskbits = Service::latest()->get();
        return view('taskbits.index', compact('taskbits'));
    }

    public function create()
    {
        return view('taskbits.create');
    }

    public function store(Request $request)
{
    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('services', 'public');
    }

    Service::create([
        'user_id' => auth()->id(),
        'title' => $request->title,
        'slug' => strtolower(str_replace(' ', '-', $request->title)),
        'description' => $request->description,
        'price' => $request->price,
        'delivery_time' => $request->delivery_time,
        'image' => $imagePath,
    ]);

    return redirect('/taskbits');
}
}

