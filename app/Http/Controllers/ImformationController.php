<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Imformation;
use App\Imformation_Class;
use DB;

class ImformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是公告列表
    public function index()
    {
        $imformations = Imformation::paginate(10);
        return view('imformations.index', compact('imformations'));
    }
    //這裡是公告搜尋
    public function search(Request $request)
    {
        $search = $request->get('search');
        $imformations = Imformation::where('title', 'like', "%".$search."%")->paginate(10);
        return view('imformations.index', compact('imformations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增公告function
    public function create()
    {
        return view('imformations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增公告資料
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
        ]);

            $imformation = new Imformation([
            'class' => $request->get('class'),
            'class_english' => DB::table('imformation_classes')->where('class', $request->get('class'))->value('class_english'),
            'tag' => implode(',' ,$request->get('tag')),
            'tag_english' => $request->get('tag_english'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'status' => implode(',' ,$request->get('status')),
            'Image_file' => $request->get('Image_file'),
            'Image_description_chin' => $request->get('Image_description_chin'),
            'Image_description_eng' => $request->get('Image_description_eng'),
            'title' => $request->get('title'),
            'title_english' => $request->get('title_english'),
            'second_title' => $request->get('second_title'),
            'second_title_english' => $request->get('second_title_english'),
            'website' => $request->get('website'),
            'website_english' => $request->get('website_english'),
            'person' => $request->get('person'),
            'context' => $request->get('context'),
            'context_english' => $request->get('context_english'),
            'file' => Storage::putFileAs('information'.'/'.$request->get('class'), $request->file('file') ,$request->file('file')->getClientOriginalName()),
            'file_english' => Storage::putFileAs('information_english'.'/'.$request->get('class'), $request->file('file_english') ,$request->file('file_english')->getClientOriginalName())
            ]);
        

        $imformation->save();
        return redirect('/imformations')->with('success', 'Imformation saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imformation = Imformation::find($id);
        return Storage::download($imformation->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是連接編輯公告function
    public function edit($id)
    {
        $imformation = Imformation::find($id);
        return view('imformations.edit', compact('imformation'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯公告資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'class'=>'required',
        ]);

            $imformation = Imformation::find($id);
            $imformation->class = $request->get('class');
            $imformation->class_english = $request->get('class_english');
            if($request->get('tag')!=null){
                $imformation->tag = implode(',' ,$request->get('tag'));
            }
            else{
                $imformation->tag = null;
            }
            $imformation->tag_english = $request->get('tag_english');
            $imformation->start_date = $request->get('start_date');
            $imformation->end_date = $request->get('end_date');
            if($request->file('file')!=null){
                $imformation->status = implode(',' ,$request->get('status'));
            }
            else{
                $imformation->status = null;
            }
            $imformation->Image_file = $request->get('Image_file');
            $imformation->Image_description_chin = $request->get('Image_description_chin');
            $imformation->Image_description_eng = $request->get('Image_description_eng');
            $imformation->title = $request->get('title');
            $imformation->title_english = $request->get('title_english');
            $imformation->second_title = $request->get('second_title');
            $imformation->second_title_english = $request->get('second_title_english');
            $imformation->website = $request->get('website');
            $imformation->website_english = $request->get('website_english');
            $imformation->person = $request->get('person');
            $imformation->context = $request->get('context');
            $imformation->context_english = $request->get('context_english');
            if($request->file('file')!=null){
            $imformation->file = Storage::putFileAs('information'.'/'.$request->get('class'), $request->file('file'),$request->file('file')->getClientOriginalName());}
            else{
                $imformation->file = $request->file('file');
            }
            if($request->file('file_english')!=null){
            $imformation->file_english = Storage::putFileAs('information'.'/'.$request->get('class'), $request->file('file_english'),$request->file('file_english')->getClientOriginalName());}
            else{
                $imformation->file_english = $request->file('file_english');                
            }        
    
        $imformation->save();
        return redirect('/imformations')->with('success', 'Imformation update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除公告
    public function destroy($id)
    {
        $imformation = Imformation::find($id);
        Storage::delete($imformation->file);
        $imformation->delete();
        return redirect('/imformations')->with('success', 'Imformation deleted!');
    }



}
