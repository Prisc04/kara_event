<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligne_commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_ligine_commande',
        'prix_unitaire',
        'total',
        'quantite',
        'date',
        'status_ligine_commande',

    ];
}
