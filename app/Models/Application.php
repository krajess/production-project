<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'postcode',
        'country',
        'vendor_name',
        'vendor_type',
        'vendor_description',
        'vendor_experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}