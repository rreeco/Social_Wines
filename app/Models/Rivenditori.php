<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rivenditori extends Model
{
    use HasFactory;
    protected $fillable = [
        'macchina', 'ricambi' 
    ];
}
