<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prefecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_prefecture',
        'description_prefecture',
        'photo_prefecture',
        'status_prefecture',

    ];
}
