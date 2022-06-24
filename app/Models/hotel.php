<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_hotel',
        'photo_hotel',
        'adresse_hotel',
        'localisation_hotel',
        'description_hotel',
        'contact_hotel',
        'email_hotel',
        'whatsapp_hotel',
        'site_hotel',
        'status_hotel',
    ];
}

