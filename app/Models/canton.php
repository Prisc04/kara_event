<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class canton extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_canton',
        'description_canton',
        'photo_canton',
        'status_canton',

    ];
}
