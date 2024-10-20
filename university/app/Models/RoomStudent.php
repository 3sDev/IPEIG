<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStudent extends Model
{
    use HasFactory;

    public function messageFiles()
    {
        return $this->hasMany('App\Models\RoomFile');
    }
}
