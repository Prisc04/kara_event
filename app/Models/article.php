<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_article_id',
        'nom_article',
        'desciption_article',
        'photo_article',
        'prix_article',
        'status_article',

    ];
    public function type_article()
    {
        return $this->belongsTo(type_article::class,'type_article_id');
    }

}


