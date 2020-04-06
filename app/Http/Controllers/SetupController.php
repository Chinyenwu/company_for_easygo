<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Keyword;

class SetupController extends Controller
{
	//這裡顯示設定
    public function index()
    {
        return view('setup');
    }
    
    public function show(){
        
    }
}
