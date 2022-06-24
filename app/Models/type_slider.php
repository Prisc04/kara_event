<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_type_slider',
        'status_type_slider',
    ];
}
