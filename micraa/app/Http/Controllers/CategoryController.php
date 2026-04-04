<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Microcategory;
use App\Models\Service;

class CategoryController extends Controller
{

    public function category($slug)
{
    $category = Category::where('slug',$slug)->firstOrFail();

    $services = Service::whereHas('subcategory', function ($q) use ($category) {
        $q->where('category_id', $category->id);
    })->latest()->paginate(20);

    return view('services.category', compact('category','services'));
}


    public function subcategory($categorySlug,$subcategorySlug)
    {
        $subcategory = Subcategory::where('slug',$subcategorySlug)->firstOrFail();

        $services = Service::where('subcategory_id',$subcategory->id)
            ->latest()
            ->paginate(20);

        return view('services.subcategory', compact('subcategory','services'));
    }


    public function micro($categorySlug,$subcategorySlug,$microSlug)
    {
        $micro = Microcategory::where('slug',$microSlug)->firstOrFail();

        $services = Service::where('microcategory_id',$micro->id)
            ->latest()
            ->paginate(20);

        return view('services.micro', compact('micro','services'));
    }

}
