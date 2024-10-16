<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function matiere()
    {
        return $this->belongsTo('App\Models\Matiere');
    }

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }

    public function codes()
    {
        return $this->belongsTo('App\Models\DevoirStudent');
    }

    public function students()
    {   //relation matiere / classe
        return $this->belongsToMany('App\Models\Student','devoir_students','devoir_id','student_id')
        ->withPivot('id', 'devoir_id', 'student_id', 'code', 'note');
    }
}
