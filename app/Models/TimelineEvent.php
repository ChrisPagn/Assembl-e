<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    protected $fillable = [
        'annee',
        'titre',
        'description',
        'image',
        'ordre',
    ];

    protected $casts = [
        'ordre' => 'integer',
    ];
}
