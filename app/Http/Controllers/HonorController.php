<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Honor;
use App\User;

class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是榮譽列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $honors = Honor::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/honors.index', compact(['honors'],['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增榮譽function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/honors.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增榮譽資料
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $honor = new Honor([
            'name' => $request->get('name'),
            'agency' => $request->get('agency'),
            'country' => $request->get('country'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $honor->save();
        $user = User::where('name',$request->get('person')) -> first();
        $honors = Honor::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/honors.index', compact(['honors','user']));
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
    //這裡是連接編輯榮譽function
    public function edit($id)
    {
        $honor = Honor::find($id);
        return view('person_lists/honors.edit', compact('honor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯榮譽資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'name'=>'required',
        ]);
            $honor = Honor::find($id);
            $honor->name = $request->get('name');
            $honor->agency = $request->get('agency');
            $honor->country = $request->get('country');
            $honor->year = $request->get('year');
            $honor->type = $request->get('type');
            $honor->file = $request->get('file');
            $honor->file_path = $request->get('file_path');
            $honor->website = $request->get('website');
            $honor->remark = $request->get('remark'); 
            $honor->save();

        $user = User::where('name',$honor->person) -> first();
        $honors = Honor::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/honors.index', compact(['honors','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除榮譽
    public function destroy($id)
    {
        $honor = Honor::find($id);
        $honor->delete();
        $user = User::where('name',$honor->person) -> first();
        $honors = Honor::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/honors.index', compact(['honors','user']));
    }
}
