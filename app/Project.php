<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'project_name',
        'job',
        'join_people',
        'mechanism',
        'year',
        'type',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'remark',
        'person'
    ];
}
