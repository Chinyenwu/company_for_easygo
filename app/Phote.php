<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phote extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'belong',
        'name',
        'file'
    ];
}
