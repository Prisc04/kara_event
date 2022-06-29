<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marche extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_marche',
        'photo_marche',
        'adresse_marche',
        'localisation_marche',
        'status_marche',
    ];
}
