<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lieu_religieu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_lieu_religieux',
        'photo_lieu_religieux',
        'adresse_lieu_religieux',
        'localisation_lieu_religieux',
        'status_lieu_religieux',

    ];
}
