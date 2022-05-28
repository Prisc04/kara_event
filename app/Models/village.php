<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_village',
        'description_village',
        'photo_village',
        'status_village',
    ];
}
