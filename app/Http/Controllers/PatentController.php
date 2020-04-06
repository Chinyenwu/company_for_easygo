<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Patent;
use App\User;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是專利列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $patents = Patent::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/patents.index', compact(['patents'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增專利function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/patents.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增專利資料
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $patent = new Patent([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'owner' => $request->get('owner'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'number' => $request->get('number'),
            'publish_schedule' => $request->get('publish_schedule'),
            'publish_date' => $request->get('publish_date'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'language' => $request->get('language'),
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $patent->save();
        $user = User::where('name',$request->get('person')) -> first();
        $patents = Patent::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/patents.index', compact(['patents','user']));
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
    //這裡是連接編輯專利function
    public function edit($id)
    {
        $patent = Patent::find($id);
        return view('person_lists/patents.edit', compact('patent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯專利資料
    public function update(Request $request, $id)
    {
      $request->validate([
            'name'=>'required',
        ]);
            $patent = Patent::find($id);
            $patent->name = $request->get('name');
            $patent->country = $request->get('country');
            $patent->owner = $request->get('owner');
            $patent->year = $request->get('year');
            $patent->type = $request->get('type');
            $patent->number = $request->get('number');
            $patent->publish_schedule = $request->get('publish_schedule');
            $patent->publish_date = $request->get('publish_date');      
            $patent->start_date = $request->get('start_date');
            $patent->end_date = $request->get('end_date');
            $patent->file = $request->get('file');
            $patent->file_path = $request->get('file_path');
            $patent->website = $request->get('website');
            $patent->language = $request->get('language');
            $patent->remark = $request->get('remark'); 
            $patent->save();
        $user = User::where('name',$patent->person) -> first();
        $patents = Patent::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/patents.index', compact(['patents','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除專利
    public function destroy($id)
    {
        $patent = Patent::find($id);
        $patent->delete();
        $user = User::where('name',$patent->person) -> first();
        $patents = Patent::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/patents.index', compact(['patents','user']));
    }
}
