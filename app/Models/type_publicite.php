<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_publicite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_type_publicite',
        'status_publicite',
    ];

    public function pubs()
    {
        return $this->hasMany(pub::class);
    }

}
