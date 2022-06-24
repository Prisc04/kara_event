<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_type_event',
        'description_type_event',
        'status_type_event',
    ];

    public function evenements()
    {
        return $this->hasMany(evenement::class);
    }
}
