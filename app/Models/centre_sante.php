<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centre_sante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_centre_sante',
        'adresse_centre_sante',
        'contact_centre_sante',
        'photo_centre_sante',
        'localisation_centre_sante',
        'status_centre_sante',
    ];
}
