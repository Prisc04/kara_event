<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_ville',
        'description_ville',
        'photo_ville',
        'status_ville',
    ];
}
