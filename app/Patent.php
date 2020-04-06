<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'name',
        'country',
        'owner',
        'year',
        'type',
        'number',
        'publish_schedule',
        'publish_date',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'language',
        'remark',
        'person'
    ];
}
