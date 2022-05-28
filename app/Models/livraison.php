<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_livraison',
        'date_livraison',
        'commantaire',
        'note_livraison',
        'status_livraison',

    ];
}
