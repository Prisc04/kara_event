<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site_touristique extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_site',
        'description_site',
        'localisation_site',
        'photo_site',
        'status_site',
    ];
}
