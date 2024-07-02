<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe_lycee extends Model
{
    use HasFactory;
    protected $fillable = [
        'Cycle',
        'maCycletieres',
    ];
}
