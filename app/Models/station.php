<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class station extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_station',
        'photo_station',
        'contact_station',
        'adresse_station',
        'localisation_station',
        'status_station',

    ];

}
