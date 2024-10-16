<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierEntrant extends Model
{
    use HasFactory;
    protected $fillable = ['numero_ordre', 'date_arrivee', 'numero_courrier', 'date_courrier', 'source', 'sujet', 'piece_jointe', 
    'destinataire', 'date_livraison', 'user'];
}
