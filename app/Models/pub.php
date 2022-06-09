<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pub extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_societe',
        'photo_publicite',
        'description_publicite',
        'date_debut_publicite',
        'date_fin_publicite',
        'type_publicite_id',
        'status_publicite',

    ];

    public function type_publicite()
    {
        return $this->belongsTo(type_publicite::class);
    }

}
