<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_event',
        'type_evenement_id',
        'dat_debut_event',
        'lieu_event',
        'date_fin_event',
       'photo_event',
       'description_event',
        'status_event'
    ];
    public function type_evenement()
    {
        return $this->belongsTo(type_evenement::class);
    }
}
