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
        'business_name',
        'business_type',
        'business_description',
        'business_experience',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}