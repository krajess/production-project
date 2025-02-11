<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
