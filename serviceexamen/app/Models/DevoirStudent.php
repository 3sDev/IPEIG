<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevoirStudent extends Model
{
    use HasFactory;

    public function devoirs()
    {
        return $this->hasMany('App\Models\Devoir');
    }
}