<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemoTask;

class DemoController extends Controller
{
    
    public function showTasks()
    {
        return view('setup/menus.index');
    }

    public function updateTasksStatus(Request $request, $id)
    {


    }

    public function updateTasksOrder(Request $request)
    {

    }

}