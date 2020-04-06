<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Imformation extends Model
{
	//這裡是填入表格資料時會填入資料表的欄位區
	protected $fillable = [
        'class',
        'class_english',
        'tag',
        'tag_english',
        'status',
        'Image_file',
        'Image_description_chin',
        'Image_description_eng',
        'start_date',
        'end_date',
        'title',
        'title_english',
        'second_title',
        'second_title_english',
        'website',
        'website_english',
        'person',
        'context',
        'context_english',
        'file',
        'file_english'
        ];
}
