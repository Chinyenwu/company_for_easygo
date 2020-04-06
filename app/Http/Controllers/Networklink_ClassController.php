<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Networklink_Class;

class Networklink_ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是網路資源類別列表
    public function index()
    {
        $networklink_classes = Networklink_Class::paginate(10);
        return view('networklink_classes.index', compact('networklink_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增網路類別資源function
    public function create()
    {
        return view('networklink_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增網路類別資源資料
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $networklink_classes = new Networklink_Class([
            'class' => $request->get('class')
        ]);
        $networklink_classes->save();
        return redirect('/networklink_classes')->with('success', 'Class saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是連接編輯網路類別資源function
    public function edit($id)
    {
        $networklink_class = Networklink_Class::find($id);
        return view('networklink_classes.edit', compact('networklink_class')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯網路類別資源資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $networklink_class = Networklink_Class::find($id);
        $networklink_class->class =  $request->get('class');
        $networklink_class->save();

        return redirect('/networklink_classes')->with('success', 'networklink_class updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除網路資源類別
    public function destroy($id)
    {
        $networklink_class = networklink_Class::find($id);
        $networklink_class->delete();
        return redirect('/networklink_classes')->with('success', 'networklink_class deleted!');
    }
}
