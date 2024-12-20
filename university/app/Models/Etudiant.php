<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table = 'etudiants';
    protected $fillable = [];

    public function classe()
    {
        return $this->belongsTo('App\Models\Classe');
    }
}
