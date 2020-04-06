<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Page_Class;

class Page_ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是頁面類別列表
    public function index()
    {
        $page_classes = Page_Class::paginate(10);
        return view('page_classes.index', compact('page_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增頁面類別function
    public function create()
    {
        return view('page_classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增頁面類別資料
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $page_classes = new Page_Class([
            'class' => $request->get('class')
        ]);
        $page_classes->save();
        return redirect('/page_classes')->with('success', 'Class saved!');
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
    //這裡是連接編輯頁面類別function
    public function edit($id)
    {
        $page_class = Page_Class::find($id);
        return view('page_classes.edit', compact('page_class')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯頁面類別資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required',
        ]);
        $page_class = page_Class::find($id);
        $page_class->class =  $request->get('class');
        $page_class->save();

        return redirect('/page_classes')->with('success', 'page_class updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除頁面類別
    public function destroy($id)
    {
        $page_class = page_Class::find($id);
        $page_class->delete();
        return redirect('/page_classes')->with('success', 'page_class deleted!');
    }
}
