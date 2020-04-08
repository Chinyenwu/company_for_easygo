<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'name',
        'title',
        'agency',
        'job_title',
        'publish_agency',
        'brief',
        'year',
        'type',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'position',
        'remark',
        'person'      
    ];
}
