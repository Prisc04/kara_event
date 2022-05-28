<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lutteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_lutteur',
        'prenom_lutteur',
        'photo_lutteur',
        'status_lutteur',
    ];
}

