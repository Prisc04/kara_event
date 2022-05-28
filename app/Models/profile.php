<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_profil',
        'description_profil',
        'status_profil'


    ];
}
