<?php

namespace App\Http\Controllers;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Fileroom;

class FileroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是檔案室列表
    public function index()
    {
        $filerooms = Fileroom::paginate(10);
        return view('filerooms.index', compact('filerooms'));
    }
    //這裡是檔案室搜尋
    public function search(Request $request)
    {
        $search = $request->get('search');
        $filerooms = Fileroom::where('title', 'like', "%".$search."%")->paginate(10);
        return view('filerooms.index', compact('filerooms'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增檔案室function
    public function create()
    {
        return view('filerooms.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增檔案室資料
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'class'=>'required',
        ]);
        $fileroom = new fileroom([
            'class' => $request->get('class'),
            'title' => $request->get('title'),
            'filename' => $request->file('file_path')->getClientOriginalName(),
            'file_path' => Storage::putFileAs('fileroom'.'/'.$request->get('class'), $request->file('file_path'),$request->file('file_path')->getClientOriginalName()),
            'editer' => $request->get('editer'),
            'edit_time' => $request->get('edit_time')

        ]);

        $fileroom->save();
        return redirect('/filerooms')->with('success', 'fileroom saved!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //這裡是網頁下載檔案
    public function show($id)
    {
        $fileroom = Fileroom::find($id);
        return Storage::download($fileroom->file_path);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是連接編輯檔案室function
    public function edit($id)
    {
        $fileroom = Fileroom::find($id);
        return view('filerooms.edit', compact('fileroom'));  
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯檔案室資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'title'=>'required',
            'class'=>'required',
        ]);

            $fileroom = Fileroom::find($id);
            $fileroom->class = $request->get('class');
            $fileroom->title = $request->get('title');
            $fileroom->filename = $request->file('file_path')->getClientOriginalName();
            $fileroom->file_path = Storage::putFileAs('fileroom'.'/'.$request->get('class'), $request->file('file_path'),$request->file('file_path')->getClientOriginalName());
            $fileroom->editer = $request->get('editer');
            $fileroom->edit_time = $request->get('edit_time');
            $fileroom->save();

        return redirect('/filerooms')->with('success', 'fileroom update!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除檔案室
    public function destroy($id)
    {
        $fileroom = Fileroom::find($id);
        Storage::delete($fileroom->file_path);
        $fileroom->delete();
        return redirect('/filerooms')->with('success', 'fileroom deleted!');
    }
}
