<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity_signup extends Model
{
    //這裡是填入表格資料時會填入資料表的欄位區
    protected $fillable = [
        'activity_name',
        'name',
        'contact_phone',
        'cell_phone',
        'fax',
        'email',
        'PID',
        'gender',
        'birthday',
        'angency',
        'work',
        'address',
        'mergency_phone',
        'mergency_contact',
        'food',
        'remark',
    ];
}
