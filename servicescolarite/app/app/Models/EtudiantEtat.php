<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantEtat extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'Etudiant-Etat';
     protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Additional actions before creating a new record
            $model->created_at = now(); // Set the created_at timestamp to the current time
        });

        static::updating(function ($model) {
            // Additional actions before updating a record
            $model->updated_at = now(); // Set the updated_at timestamp to the current time
        });
    }

    use HasFactory;
}


