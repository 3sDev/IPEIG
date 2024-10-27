<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voeu extends Model
{
    use HasFactory;

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function matieres()
    {
        return $this->belongsTo('App\Models\Matiere',' voeu_matieres','voeu_id','matiere_id');
    }

    // public function matieres()
    // {
    //     return $this->belongsTo('App\Models\Matiere', 'matiere_id', 'id');
    // }

    // public function vouexMatieres()
    // {
    //     return $this->hasMany('App\Models\VoeuMatiere');
    // }
}