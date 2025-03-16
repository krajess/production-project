<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity')->withTimestamps();
    }
}
