<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    public function products()

    {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function vendor()

    {
        return $this->belongsTo(Vendor::class);
    }
}
