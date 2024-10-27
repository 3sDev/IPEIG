<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
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
        return $this->belongsTo('App\Models\ExamenStudent');
    }

    public function students()
    {   //relation student / examen
        return $this->belongsToMany('App\Models\Student','examen_students','examen_id','student_id')
        ->withPivot('id', 'examen_id', 'student_id', 'code', 'note');
    }
}
