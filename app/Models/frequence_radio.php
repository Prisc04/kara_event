<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frequence_radio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_radio',
        'photo_radio',
        'adresse_radio',
        'contact_radio',
        'localisation_radio',
        'status_radio',
    ];
}
