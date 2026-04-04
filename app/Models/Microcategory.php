<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Microcategory extends Model
{
    protected $fillable = ['subcategory_id','name','slug'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
