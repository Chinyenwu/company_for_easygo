<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Reserch extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'name',
        'brief',
        'all_editer',
        'year',
        'type',
        'start_date',
        'file',
        'file_path',
        'website',
        'language',
        'remark',
        'person'
    ];
}
