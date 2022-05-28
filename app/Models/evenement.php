<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_event',
        'date_debut_event',
        'date_fin_event',
       'photo_event',
       'description_event',
        'status_event'
    ];
}
