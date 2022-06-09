<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actualite extends Model
{
    use HasFactory;
    protected $fillable = [

       'nom_acteur',
        'prenom_acteur',
        'description_actualite',
        'photo_actualite',
        'date_actualite',
        'status_publicite',
    ];
}
