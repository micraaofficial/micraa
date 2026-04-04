<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /* =======================
       HOME
    ======================= */
    public function index()
    {
        $services = Service::latest()->get();

        return view('home', compact('services'));
    }

    /* =======================
       SEARCH
    ======================= */
    public function search(Request $request)
    {
        $query = trim($request->query('query'));

        if (!$query) {
            return redirect('/');
        }

        $services = Service::where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->latest()
            ->get();

        return view('home', compact('services'));
    }

    /* =======================
       CREATE PAGE
    ======================= */
    public function create()
    {
        return view('taskbits.create');
    }

    /* =======================
       STORE TASKBIT
    ======================= */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'delivery_time' => 'required|numeric',
            'microcategory_id' => 'required',
            'tags' => 'required'
        ]);

        // ✅ FIX TAGS (trim + remove empty)
        $tags = array_filter(array_map('trim', explode(',', $request->tags)));

        if (count($tags) !== 5) {
            return back()->withErrors(['tags' => 'You must add exactly 5 tags'])->withInput();
        }

        $service = new Service();

        $service->title = $request->title;
        $service->slug = Str::slug($request->title) . '-' . time();
        $service->description = $request->description;
        $service->price = $request->price;
        $service->delivery_time = $request->delivery_time;
        $service->subcategory_id = $request->subcategory_id;
        $service->microcategory_id = $request->microcategory_id;
        $service->user_id = 1; // temporary
        $service->tags = implode(',', $tags);

        $service->save();

        /* IMAGE UPLOAD */
        $folder = "services/micro/" . $service->id;

        if ($request->hasFile('image1')) {
            $service->image1 = $request->file('image1')->store($folder, 'public');
        }

        if ($request->hasFile('image2')) {
            $service->image2 = $request->file('image2')->store($folder, 'public');
        }

        if ($request->hasFile('image3')) {
            $service->image3 = $request->file('image3')->store($folder, 'public');
        }

        $service->save();

        return redirect('/dashboard')->with('success', 'Taskbit created successfully!');
    }

    /* =======================
       EDIT
    ======================= */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('edit-taskbit', compact('service'));
    }

    /* =======================
       UPDATE
    ======================= */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'delivery_time' => 'required|numeric',
        ]);

        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->delivery_time = $request->delivery_time;
        $service->tags = $request->tags;

        $folder = "services/micro/" . $service->id;

        if ($request->hasFile('image1')) {
            $service->image1 = $request->file('image1')->store($folder, 'public');
        }

        if ($request->hasFile('image2')) {
            $service->image2 = $request->file('image2')->store($folder, 'public');
        }

        if ($request->hasFile('image3')) {
            $service->image3 = $request->file('image3')->store($folder, 'public');
        }

        $service->save();

        return redirect('/dashboard')->with('success', 'Taskbit updated successfully!');
    }

    /* =======================
       DELETE
    ======================= */
    public function delete($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return redirect('/dashboard')->with('success', 'Taskbit deleted successfully!');
    }
}
