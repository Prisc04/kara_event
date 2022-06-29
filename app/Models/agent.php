<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_agence',
        'photo_agence',
        'localisation_agence',
        'adresse_agence ',
        'contact_agence',
        'status_agence',
    ];
}
