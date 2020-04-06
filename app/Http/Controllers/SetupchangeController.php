<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Setupchange;

class SetupchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是連接編輯設定function
    public function create()
    {
        $setupchange = Setupchange::find(1);
        return view('setup/setupchanges.edit',compact('setupchange'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯設定資料
    public function store(Request $request)
    {
        $setupchange = Setupchange::find(1);
        $setupchange->encryption =  $request->get('encryption');
        $setupchange->logouttime = $request->get('logouttime');
        $setupchange->loginfail = $request->get('loginfail');
        $setupchange->uploadtype =  $request->get('uploadtype');
        $setupchange->uploadsize = $request->get('uploadsize');
        $setupchange->picturetype = $request->get('picturetype');
        $setupchange->picturesize = $request->get('picturesize');
        $setupchange->headpastesize =  $request->get('headpastesize');
        $setupchange->headpastewidth = $request->get('headpastewidth');
        $setupchange->headpasteheight = $request->get('headpasteheight');
        $setupchange->photeuploadnumber =  $request->get('photeuploadnumber');
        $setupchange->save();
        return view('setup/setupchanges.edit',compact('setupchange'))->with('success', 'setupchange updated!');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
