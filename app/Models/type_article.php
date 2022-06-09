<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_article extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle_type_article',
        'description_type_article',
        'status_type_article',

    ];

    public function articles()
    {
        return $this->hasMany(article::class);
    }
}
