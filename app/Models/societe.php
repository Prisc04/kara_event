<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class societe extends Model
{
    use HasFactory;

    protected $fillable = [
        'raison_social',
        'adresse_societe',
        'numero_societe',
        'email_societe',
        'nif_societe',
        'rccm_societe',
        'logo_societe',
        'photo_societe',
        'note_societe',
        'status_societe',
        'type_societe_id'
    ];

    public function type_societe()
    {
        return $this->belongsTo(type_societe::class);
    }
}
