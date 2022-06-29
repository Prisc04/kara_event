<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_canton1',
        'point_score1',
        'nom_canton2',
        'point_score2',
        'status_score',

    ];

}
