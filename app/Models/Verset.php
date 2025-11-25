<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verset extends Model
{
    protected $fillable = [
        'jour_index',
        'reference',
        'texte',
    ];
}
