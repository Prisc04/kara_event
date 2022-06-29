<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_gym',
        'photo_gym',
        'adresse_gym',
        'localisation_gym',
        'status_gym',
    ];
}
