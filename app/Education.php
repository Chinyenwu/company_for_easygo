<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'name',
        'country',
        'department',
        'degree',
        'start_date',
        'end_date',
        'website',
        'remark',
        'person'
    ];
}
