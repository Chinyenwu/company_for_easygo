<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是頁面列表
    public function index()
    {
        $pages = Page::paginate(10);
        return view('pages.index', compact('pages'));
    }
    //這裡是搜尋頁面
    public function search(Request $request)
    {
        $search = $request->get('search');
        $pages = Page::where('title', 'like', "%".$search."%")->paginate(10);
        return view('pages.index', compact('pages'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增頁面function
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增頁面資料
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'class'=>'required',
        ]);
        $page = new Page([
            'class' => $request->get('class'),
            'editer' => $request->get('editer'),
            'title' => $request->get('title'),
            'context' => $request->get('context'),
            'edit_time' => $request->get('edit_time')
        ]);
        $page->save();
        return redirect('/pages')->with('success', 'page saved!');
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
    //這裡是連接編輯頁面function
    public function edit($id)
    {
        $page = Page::find($id);
        return view('pages.edit', compact('page')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯頁面資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'title'=>'required',
            'class'=>'required',
        ]);
            $page = Page::find($id);
            $page->class = $request->get('class');
            $page->editer = $request->get('editer');
            $page->title = $request->get('title');
            $page->context = $request->get('context');
            $page->edit_time = $request->get('edit_time');
            $page->save();
        return redirect('/pages')->with('success', 'page update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除頁面
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('/pages')->with('success', 'Page deleted!');
    }
}
