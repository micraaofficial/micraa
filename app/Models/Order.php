<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id',
        'service_id',
        'price',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
