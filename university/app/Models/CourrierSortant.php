<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierSortant extends Model
{
    use HasFactory;
    protected $fillable = ['numero_inscription', 'date_edition', 'sujet', 'piece_jointe', 'destinataire', 'voie_envoi', 
    'observation', 'user'];
}
