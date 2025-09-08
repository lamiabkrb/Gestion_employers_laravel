<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employé extends Model
{
    protected $fillable = ['nom', 'prenom', 'email', 'contact', 'departement_id', 'montant_journalier'];


    // definir les relation entre les table 
    // Chaque employé appartient a un departement 
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}


