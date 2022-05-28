<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle_commande',
        'date_commande',
        'montant_total_commande',
        'description_commande',
        'status_commande',
    ];
}
