<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programme_evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'jour_programme',
        'date_programme',
        'heure_programme',
        'match_programme',
        'lieu_programme',
        'status_programme',
    ];
}

