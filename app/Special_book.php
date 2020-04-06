<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Special_book extends Model
{
  //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'name',
        'chapter',
        'main_editer',
        'publish_club',
        'publish_position',
        'all_editer',
        'year',
        'date',
        'page',
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
