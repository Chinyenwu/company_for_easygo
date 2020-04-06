<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Special_book;
use App\User;

class Special_BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是專書列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $special_books = Special_book::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/special_books.index', compact(['special_books'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增專書function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/special_books.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增專書資料
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $special_book = new Special_book([
            'name' => $request->get('name'),
            'chapter' => $request->get('chapter'),
            'main_editer' => $request->get('main_editer'),
            'publish_club' => $request->get('publish_club'),
            'publish_position' => $request->get('publish_position'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'date' => $request->get('date'),
            'page' => $request->get('page'),
            'editer_number' => $request->get('editer_number'),
            'editer_type' => $request->get('editer_type'),
            'ISSN' => $request->get('ISSN'),
            'ISI_Number' => $request->get('ISI_Number'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'language' => $request->get('language'),
            'project_name' => $request->get('project_name'),
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $special_book->save();
        $user = User::where('name',$request->get('person')) -> first();
        $special_books = Special_book::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/special_books.index', compact(['special_books','user']));
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
    //這裡是連接編輯專書function
    public function edit($id)
    {
        $special_book = Special_book::find($id);
        return view('person_lists/special_books.edit', compact('special_book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯專書資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'name'=>'required',
        ]);
            $special_book = Special_book::find($id);
            $special_book->name = $request->get('name');
            $special_book->chapter = $request->get('chapter');
            $special_book->main_editer = $request->get('main_editer');
            $special_book->publish_club = $request->get('publish_club');
            $special_book->publish_position = $request->get('publish_position');
            $special_book->all_editer = $request->get('all_editer');
            $special_book->year = $request->get('year');
            $special_book->date = $request->get('date');
            $special_book->page = $request->get('page');
            $special_book->editer_number = $request->get('editer_number');
            $special_book->editer_type = $request->get('editer_type');
            $special_book->ISSN = $request->get('ISSN');
            $special_book->ISI_Number = $request->get('ISI_Number');
            $special_book->file = $request->get('file');
            $special_book->file_path = $request->get('file_path');
            $special_book->website = $request->get('website');
            $special_book->language = $request->get('language');
            $special_book->project_name = $request->get('project_name');
            $special_book->remark = $request->get('remark'); 
            $special_book->save();
        $user = User::where('name',$special_book->person) -> first();
        $special_books = Special_book::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/special_books.index', compact(['special_books','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除專書
    public function destroy($id)
    {
        $special_book = Special_book::find($id);
        $special_book->delete();
        $user = User::where('name',$special_book->person) -> first();
        $special_books = Special_book::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/special_books.index', compact(['special_books','user']));
    }
}
