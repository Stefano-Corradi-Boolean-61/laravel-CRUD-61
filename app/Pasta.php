<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{

    // imposto tutte le colonne da popolare
    protected $fillable = [
        'name',
        'type',
        'description',
        'slug',
        'image'
    ];
}
