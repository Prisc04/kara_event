<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boite_nuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_boite_nuit',
        'photo_boite_nuit',
        'adresse_boite_nuit',
        'localisation_boite_nuit',
        'status_boite_nuit',
    ];
}

