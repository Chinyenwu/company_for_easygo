<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'uniquename',
        'title',
        'url',
        'layer',
        'parent',
        'sort',
        'function',
        'class'    
    ];
}