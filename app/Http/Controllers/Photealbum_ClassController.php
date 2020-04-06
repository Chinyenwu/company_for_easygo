<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Photealbum_class;

class Photealbum_ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是相簿類別列表
    public function index()
    {
        $photealbum_classes = Photealbum_Class::paginate(10);
        return view('photealbum_classes.index', compact('photealbum_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增相簿類別function
    public function create()
    {
        return view('photealbum_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增相簿類別資料
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $photealbum_classes = new Photealbum_Class([
            'class' => $request->get('class')
        ]);
        $photealbum_classes->save();
        return redirect('/photealbum_classes')->with('success', 'Class saved!');
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
    //這裡是連接編輯相簿類別function
    public function edit($id)
    {
        $photealbum_class = Photealbum_Class::find($id);
        return view('photealbum_classes.edit', compact('photealbum_class')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯相簿類別資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $photealbum_class = photealbum_Class::find($id);
        $photealbum_class->class =  $request->get('class');
        $photealbum_class->save();

        return redirect('/photealbum_classes')->with('success', 'photealbum_class updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除相簿類別
    public function destroy($id)
    {
        $photealbum_class = photealbum_Class::find($id);
        $photealbum_class->delete();
        return redirect('/photealbum_classes')->with('success', 'photealbum_class deleted!');
    }
}
