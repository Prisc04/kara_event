<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class action extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_action',
        'date_action',
        'photo_action',
        'description_action',
        'status_action',
    ];
}
