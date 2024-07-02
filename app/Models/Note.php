<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = [
        'matiere',
        'Num_bulletin',
        'Annee_scolaire',
        'Note',
        'id_elev',
        'IM',
        'Nom_elev',
        'Prenom_eleve',
        'Cycle',
    ];
}
