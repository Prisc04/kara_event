<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_canton',
        'point_score',
        'status_score',

    ];

}