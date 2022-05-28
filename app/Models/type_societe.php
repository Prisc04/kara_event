<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_type_societe',
        'nom_type_societe',
        'status_type_societe',
    ];

}
