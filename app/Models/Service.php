<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Subcategory;
use App\Models\Microcategory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category',
        'subcategory_id',
        'microcategory_id',
        'image1',
        'user_id'
    ];

    // Subcategory relation
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Microcategory relation
    public function microcategory()
    {
        return $this->belongsTo(Microcategory::class);
    }

    // Seller relation (DP + Name)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // ✅ ADD THIS (for reviews page to work)
    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }
}
