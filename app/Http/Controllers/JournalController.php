<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Journal;
use App\User;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是期刊列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $journals = Journal::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/journals.index', compact(['journals'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增期刊function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/journals.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增期刊資料
    public function store(Request $request)
    {
        $request->validate([
            'speech_name'=>'required'
        ]);

        $journal = new Journal([
            'speech_name' => $request->get('speech_name'),
            'journal_name' => $request->get('journal_name'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'level' => $request->get('level'),
            'date' => $request->get('date'),
            'book_number' => $request->get('book_number'),
            'journal_number' => $request->get('journal_number'),
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
        $journal->save();
        $user = User::where('name',$request->get('person')) -> first();
        $journals = Journal::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/journals.index', compact(['journals','user']));
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
    //這裡是連接編輯期刊function
    public function edit($id)
    {
        $journal = Journal::find($id);
        return view('person_lists/journals.edit', compact('journal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯期刊資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'speech_name'=>'required',
        ]);
            $journal = Journal::find($id);
            $journal->speech_name = $request->get('speech_name');
            $journal->journal_name = $request->get('journal_name');
            $journal->all_editer = $request->get('all_editer');
            $journal->year = $request->get('year');
            $journal->level = $request->get('level');
            $journal->date = $request->get('date');
            $journal->book_number = $request->get('book_number');
            $journal->journal_number = $request->get('journal_number');
            $journal->page = $request->get('page');
            $journal->editer_number = $request->get('editer_number');
            $journal->editer_type = $request->get('editer_type');
            $journal->ISSN = $request->get('ISSN');
            $journal->ISI_Number = $request->get('ISI_Number');
            $journal->file = $request->get('file');
            $journal->file_path = $request->get('file_path');
            $journal->website = $request->get('website');
            $journal->language = $request->get('language');
            $journal->project_name = $request->get('project_name');
            $journal->remark = $request->get('remark'); 
            $journal->save();

        $user = User::where('name',$journal->person) -> first();
        $journals = Journal::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/journals.index', compact(['journals','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除期刊
    public function destroy($id)
    {
        $journal = Journal::find($id);
        $journal->delete();
        $user = User::where('name',$journal->person) -> first();
        $journals = Journal::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/journals.index', compact(['journals','user']));
    }
}
