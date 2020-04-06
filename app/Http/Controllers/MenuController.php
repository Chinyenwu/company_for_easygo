<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('setup/menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $layer =  $request->get('layer');
        $sort =  $request->get('sort');
        $parent =  $request->get('parent');
        return view('setup/menus.create',compact(['layer'],['sort'],['parent']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'uniquename'=>['required','unique:menus'],
            'title'=>'required',
        ]);

        $menu = new Menu([
            'uniquename' => $request->get('uniquename'),
            'title' => $request->get('title'),
            'parent' => $request->get('parent'),
            'sort' => $request->get('sort'),
            'layer'=> $request->get('layer')
        ]);
        $menu->save();
        return view('setup/menus.index');
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
        $menu = Menu::find($id);
        return view('setup/menus.edit', compact('menu'));          //
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
        $menu = Menu::find($id);
        $menu->title = $request->get('title');
        $menu->save();
        return redirect('setup/menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return view('setup/menus.index'); 
    }
}
