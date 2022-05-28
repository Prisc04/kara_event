<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guichet_automatique extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_guichet',
        'photo_guichet',
        'description_guichet',
        'status_guichet',
    ];
}
