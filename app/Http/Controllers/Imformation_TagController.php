<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Imformation_Tag;

class Imformation_TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是公告標籤列表
    public function index()
    {
        $imformation_tags = Imformation_Tag::paginate(10);

        return view('imformation_tags.index', compact('imformation_tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增公告標籤function
    public function create()
    {
        return view('imformation_tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增公告標籤資料
    public function store(Request $request)
    {
        $request->validate([
            'tag'=>'required',
        ]);

        $imformation_tags = new Imformation_Tag([
            'tag' => $request->get('tag'),
            'tag_english' => $request->get('tag_english')
        ]);
        $imformation_tags->save();
        return redirect('/imformation_tags')->with('success', 'tag saved!');
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
    //這裡是連接編輯公告標籤function
    public function edit($id)
    {
        $imformation_tag = Imformation_Tag::find($id);
        return view('imformation_tags.edit', compact('imformation_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯公告標籤資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'tag'=>'required',
        ]);

        $imformation_tag = imformation_Tag::find($id);
        $imformation_tag->tag =  $request->get('tag');
        $imformation_tag->tag_english =  $request->get('tag_english');
        $imformation_tag->save();

        return redirect('/imformation_tags')->with('success', 'imformation_tag updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    //這裡是刪除公告標籤
    public function destroy($id)
    {
        $imformation_tag = imformation_Tag::find($id);
        $imformation_tag->delete();

        return redirect('/imformation_tags')->with('success', 'imformation_tag deleted!');
    }
}
