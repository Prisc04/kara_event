<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adresse_livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_adresse_livraison',
        'telephone_adresse_livraison',
        'description_adresse_livraison',
        'localisation_adresse_livraison',
        'date_adresse_livraison',
        'longitude_adresse_livraison',
        'latitude_adresse_livraison',
        'status_adresse_livraison',
    ];
}
