<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matiere_lycee extends Model
{
    use HasFactory;
    protected $fillable = [
        'matieres',
        'Coef',
        'Code_matiere',
        'Cycle',
    ];
}
