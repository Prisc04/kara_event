<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_slider',
        'photo_slider',
        'description_slider',
        'status_slider',
    ];
}
