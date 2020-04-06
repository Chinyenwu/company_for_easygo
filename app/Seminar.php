<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'speech_name',
        'meeting_name',
        'position',
        'agency',
        'all_editer',
        'year',
        'type',
        'level',
        'start_date',
        'end_date',
        'publish_year',
        'editer_number',
        'editer_type',
        'ISSN',
        'ISI_Number',
        'file',
        'file_path',
        'website',
        'language',
        'project_name',
        'remark',
        'person'
    ];
}
