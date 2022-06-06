<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_article',
        'nom_article',
        'desciption_article',
        'photo_article',
        'prix_article',
        'status_article',
    ];

}


