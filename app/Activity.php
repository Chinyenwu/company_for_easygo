<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'class',
        'signup_start_date',
        'signup_end_date',
        'start_date',
        'end_date',
        'name',
        'context',
        'position',
        'remark',
        'website',
        'file',
        'file_path',
    ];
}
