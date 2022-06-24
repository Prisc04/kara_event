<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_pharmacie',
        'adresse_pharmacie',
        'contact_pharmacie',
        'photo_pharmacie',
        'localisation_pharmacie',
        'status_pharmacie',
    ];
}
