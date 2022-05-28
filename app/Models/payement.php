<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payement extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_payement',
        'nom_payeur',
        'prenom_payeur',
        'telephone_payeur',
        'desciption_payement',
        'montant_payement',
        'type_payement',
        'date_payement',
        'status_payement'
    ];
}
