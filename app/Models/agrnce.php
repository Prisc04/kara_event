<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agrnce extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_agence',
        'photo_agence',
        'localisation_agence',
        'description_agence',
        'status_agence',
    ];
}
