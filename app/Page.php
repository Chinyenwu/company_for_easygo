<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	//這裡是填入表格資料時會填入資料表的欄位區
	protected $fillable = [
        'class',
        'editer',
        'title',
        'context',
        'edit_time'
        ];
}
