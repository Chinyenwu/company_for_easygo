<?php

namespace App\Http\Controllers;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Photealbum;
use App\Phote;

class PhoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是相簿照片列表
    public function index()
    {
        $photes = Phote::paginate(10);
        return view('photes.index', compact('photes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增相簿照片function
    public function create()
    {
        return view('photes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增相簿照片資料
    public function store(Request $request)
    {
        $phote = new Phote([
            'belong' => $request->get('belong'),
            'name' => $request->file('file')->getClientOriginalName(),
            'file' => Storage::putFileAs('phote'.'/'.$request->get('belong'), $request->file('file'),$request->file('file')->getClientOriginalName())
        ]);
        $phote->save();
        return redirect('/photes')->with('success', 'Phote saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是下載照片
    public function show($id)
    {
        $phote = Phote::find($id);
        return Storage::download($phote->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是連接編輯相簿照片function
    public function edit($id)
    {
        $photealbum = Photealbum::find($id);
        return view('photes.edit', compact('photealbum')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯相簿照片資料
    public function update(Request $request, $id)
    {
        $photealbum = Photealbum::find($id);
        if($request->hasfile('file'))
        {
            foreach($request->file('file') as $file)
            {
            $phote = new Phote([
            'belong' => $request->get('belong'),
            'name' => $file->getClientOriginalName(),
            'file' => Storage::putFileAs('public/phote/'.$request->get('belong'), $file,$file->getClientOriginalName())
            ]);
            $phote->save();
            }     
        }
        $photes = Phote::where('belong', '=', $photealbum->title)->paginate(10);
        return view('photes.index', compact(['photes'],['photealbum']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除相簿照片
    public function destroy($id)
    {
        $phote = Phote::find($id);
        $photeid = Photealbum::where('title', '=', $phote->belong)->firstOrFail();
        $photealbum = Photealbum::find($photeid->id);
        Storage::delete($phote->file);
        $phote->delete();
        $photes = Phote::where('belong', '=', $photealbum->title)->paginate(10);
        return view('photes.index', compact('photes','photealbum'));
    }

}
