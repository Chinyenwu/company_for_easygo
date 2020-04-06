<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Project;
use App\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是專案列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $projects = Project::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/projects.index', compact(['projects'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增專案function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/projects.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增專案資料
    public function store(Request $request)
    {
        $request->validate([
            'project_name'=>'required'
        ]);
        $project = new Project([
            'project_name' => $request->get('project_name'),
            'job' => $request->get('job'),
            'join_people' => $request->get('join_people'),
            'mechanism' => $request->get('mechanism'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'start_date' => $request->get('start_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $project->save();
        $user = User::where('name',$request->get('person')) -> first();
        $projects = Project::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/projects.index', compact(['projects','user']));
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
    //這裡是連接編輯專案function
    public function edit($id)
    {
        $project = Project::find($id);
        return view('person_lists/projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯專案資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'project_name'=>'required',
        ]);
            $project = Project::find($id);
            $project->project_name = $request->get('project_name');
            $project->job = $request->get('job');
            $project->join_people = $request->get('join_people');
            $project->mechanism = $request->get('mechanism');
            $project->year = $request->get('year');
            $project->type = $request->get('type');
            $project->file = $request->get('file');
            $project->file_path = $request->get('file_path');
            $project->website = $request->get('website');
            $project->remark = $request->get('remark'); 
            $project->save();
        $user = User::where('name',$project->person) -> first();
        $projects = Project::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/projects.index', compact(['projects','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除專案
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        $user = User::where('name',$project->person) -> first();
        $projects = Project::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/projects.index', compact(['projects','user']));
    }
}
