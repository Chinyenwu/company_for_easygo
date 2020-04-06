<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photealbum extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'class',
        'title',
        'context'
    ];
}
