<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestCodePassword extends Model
{
     protected $fillable = [
        'code',
        'email',
        // ajoute les autres colonnes que tu veux autoriser
    ];
}
