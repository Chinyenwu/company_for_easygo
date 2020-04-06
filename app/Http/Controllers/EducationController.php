<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Education;
use App\User;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是學歷列表
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $educations = Education::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/educations.index', compact(['educations','user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增學歷function
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/educations.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增學歷資料
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $education = new Education([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'department' => $request->get('department'),
            'degree' => $request->get('degree'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $education->save();
        $user = User::where('name',$request->get('person')) -> first();
        $educations = Education::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/educations.index', compact(['educations','user']));
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

    //這裡是連接編輯學歷function
    public function edit($id)
    {
        $education = Education::find($id);
        return view('person_lists/educations.edit', compact('education')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯學歷資料
    public function update(Request $request, $id)
    {
       $request->validate([
            'name'=>'required',
        ]);
            $education = Education::find($id);
            $education->name = $request->get('name');
            $education->country = $request->get('country');
            $education->department = $request->get('department');
            $education->degree = $request->get('degree');
            $education->start_date = $request->get('start_date');
            $education->end_date = $request->get('end_date');
            $education->website = $request->get('website');
            $education->remark = $request->get('remark'); 
            $education->save();

        $user = User::where('name',$education->person) -> first();
        $educations = Education::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/educations.index', compact(['educations','user']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除學歷
    public function destroy($id)
    {
        $education = Education::find($id);
        $education ->delete();
        $user = User::where('name',$education->person) -> first();
        $educations = Education::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/educations.index', compact(['educations','user']));
    }
}
