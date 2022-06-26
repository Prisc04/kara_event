<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programme_evala extends Model
{
    use HasFactory;
    protected $fillable = [
        'jour_programme_evala',
        'date_programme_evala',
        'rencontre_programme_evala',
        'lieu_programme_evala',
        'localisation_programme_evala',
        'heure_programme_evala',
        'observation_programme_evala',
        'status_programme_evala',
    ];
}
