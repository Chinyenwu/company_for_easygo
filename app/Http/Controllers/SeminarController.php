<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Seminar;
use App\User;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是研討會論文列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $seminars = Seminar::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/seminars.index', compact(['seminars'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增研討會論文function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/seminars.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增研討會論文資料
    public function store(Request $request)
    {
        $request->validate([
            'speech_name'=>'required'
        ]);
        $seminar = new Seminar([
            'speech_name' => $request->get('speech_name'),
            'meeting_name' => $request->get('meeting_name'),
            'position' => $request->get('position'),
            'agency' => $request->get('agency'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'level' => $request->get('level'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'publish_year' => $request->get('publish_year'),
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
        $seminar->save();
        $user = User::where('name',$request->get('person')) -> first();
        $seminars = Seminar::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/seminars.index', compact(['seminars','user']));    }

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
    //這裡是連接編輯研討會論文function
    public function edit($id)
    {
        $seminar = Seminar::find($id);
        return view('person_lists/seminars.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯研討會論文資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'speech_name'=>'required',
        ]);
            $seminar = Seminar::find($id);
            $seminar->speech_name = $request->get('speech_name');
            $seminar->meeting_name = $request->get('meeting_name');
            $seminar->position = $request->get('position');
            $seminar->agency = $request->get('agency');
            $seminar->all_editer = $request->get('all_editer');
            $seminar->year = $request->get('year');
            $seminar->type = $request->get('type');
            $seminar->level = $request->get('level');
            $seminar->start_date = $request->get('start_date');
            $seminar->end_date = $request->get('end_date');
            $seminar->publish_year = $request->get('publish_year');
            $seminar->editer_number = $request->get('editer_number');
            $seminar->editer_type = $request->get('editer_type');
            $seminar->ISSN = $request->get('ISSN');
            $seminar->ISI_Number = $request->get('ISI_Number');
            $seminar->file = $request->get('file');
            $seminar->file_path = $request->get('file_path');
            $seminar->website = $request->get('website');
            $seminar->language = $request->get('language');
            $seminar->project_name = $request->get('project_name');
            $seminar->remark = $request->get('remark'); 
            $seminar->save();
        $user = User::where('name',$seminar->person) -> first();
        $seminars = Seminar::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/seminars.index', compact(['seminars','user']));    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除研討會論文
    public function destroy($id)
    {
        $seminar = Seminar::find($id);
        $seminar->delete();
        $user = User::where('name',$seminar->person) -> first();
        $seminars = Seminar::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/seminars.index', compact(['seminars','user']));    }
    }
}
