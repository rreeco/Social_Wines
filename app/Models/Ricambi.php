<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ricambi extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricola','componente','prezzo','rivenditori', 'macchina'
    ];
}
