<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemoTask extends Model
{
    //
    protected $fillable = [
         'title','order', 'status'
    ];
}
