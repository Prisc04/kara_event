<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_reserveur',
        'prenom_reserveur',
        'telephone_reserveur',
        'type_reservation',
        'nombre_personne',
        'date_debut_reservation',
        'date_fin_reservation',
        'nombre_jour_reservation',
        'prix_journalier_chambre',
        'prix_total',
        'date_reservation',
        'statut_reservation',
    ];
}
