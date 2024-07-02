<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere_ceg extends Model
{
    use HasFactory;
    protected $fillable = [
        'matieres',
        'Code_matiere',
        'Coef',
    ];
}
