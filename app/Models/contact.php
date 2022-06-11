<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{

    use HasFactory;
    protected $fillable = [
        'nom_contact',
        'email_contact',
        'telephone_contact',
        'objet_contact',
        'message_contact',
        'status_contact',
    ];
}
