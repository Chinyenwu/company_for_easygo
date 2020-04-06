<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Networklink;

class NetworklinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是網路資源列表
    public function index()
    {
        $networklinks = Networklink::paginate(10);
        return view('networklinks.index', compact('networklinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接新增網路資源function
    public function create()
    {
        return view('networklinks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收新增網路資源資料
    public function store(Request $request)
    {
       $request->validate([
            'class'=>'required',
            'title'=>'required'
        ]);

        $networklink = new Networklink([
            'class' => $request->get('class'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'link' => $request->get('link'),
            'way' => $request->get('way'),
            'editer' => $request->get('editer')
        ]);
        $networklink->save();
        return redirect('/networklinks')->with('success', 'Contact saved!');
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
    //這裡是連接編輯網路資源function
    public function edit($id)
    {
        $networklink = Networklink::find($id);
        return view('networklinks.edit', compact('networklink'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯網路資源資料
    public function update(Request $request, $id)
    {
        $request->validate([
            'class'=>'required',
            'title'=>'required'
        ]);

        $networklink = Networklink::find($id);
        $networklink->class =  $request->get('class');
        $networklink->title = $request->get('title');
        $networklink->content = $request->get('content');
        $networklink->link = $request->get('link');
        $networklink->way = $request->get('way');
        $networklink->editer = $request->get('editer');
        $networklink->save();

        return redirect('/networklinks')->with('success', 'Networklink updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是刪除網路資源
    public function destroy($id)
    {
        $networklink = Networklink::find($id);
        $networklink->delete();
        return redirect('/networklinks')->with('success', 'Networklink deleted!');
    }
}
