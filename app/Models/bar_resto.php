<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bar_resto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_bar_resto',
        'photo_bar_resto',
        'adresse_bar_resto',
        'localisation_bar_resto',
        'description_bar_resto',
        'contact_bar_resto',
        'email_bar_resto',
        'whatsapp_bar_resto',
        'site_bar_resto',
        'status_bar_resto',
    ];
}

