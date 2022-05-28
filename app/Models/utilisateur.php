<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_utilisateur',
        'prenom_utilisateur',
        'adresse_provenance_utilisateur',
        'adresse_residence_utilisateur',
        'pays_provenance_utilisateur',
        'date_naissance_utilisateur',
        'email_utilisateur',
        'mot_passe_utilisateur',
        'numero_piece_identite',
        'telephone_utilisateur',
        'photo_identite_utilisateur',
        'status_utilisateur',
    ];
}
