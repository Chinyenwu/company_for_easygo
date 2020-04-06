<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是職稱列表
    public function index()
    {
        $positions = Position::paginate(10);
        return view('positions.index', compact('positions'));
    }
    //這裡是搜尋職稱
    public function search(Request $request)
    {
        $search = $request->get('search');
        $positions = Position::where('class', 'like', "%".$search."%")->paginate(10);
        return view('positions.index', compact('positions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增職稱function
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增職稱資料
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required'
        ]);
        $contact = new Position([
            'class' => $request->get('class'),
            'position' => $request->get('position')
        ]);
        $contact->save();
        return redirect('/positions')->with('success', 'Positon saved!');
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
    //這裡是連接編輯職稱function
    public function edit($id)
    {
        $position = Position::find($id);
        return view('positions.edit', compact('position'));     
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯職稱資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required'
        ]);
        $position = Position::find($id);
        $position->class =  $request->get('class');
        $position->position = $request->get('position');
        $position->save();
        return redirect('/positions')->with('success', 'Position updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除職稱
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->delete();
        return redirect('/positions')->with('success', 'Position deleted!');
    }
}
