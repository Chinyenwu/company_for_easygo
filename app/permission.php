<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
    	'name',
        'advertising',
        'imformation',
        'fileroom',
        'photealbum',
        'page',
        'networklink',
        'auth',
        'register',
        'positions',
        'setup',
        'menus',
        'website_information',
        'keyword',
        'setupchange'
    ];
}
