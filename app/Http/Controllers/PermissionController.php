<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //這裡是成員權限列表
    public function index()
    {
        $users = User::paginate(10);
        return view('permissions.index', compact('users'));
    }
    //這裡是搜尋成員
    public function search(Request $request)
    {
        $search = $request->get('search');
        $users = User::where('name', 'like', "%".$search."%")->paginate(10);
        return view('permissions.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    //這裡是連接編輯成員權限function
    public function edit($id)
    {
        $user = User::find($id);
        $permission = Permission::where('name', 'like', "%".$user->name."%")->first();
        return view('permissions.edit', compact('permission')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //這裡是接收編輯成員權限資料
    public function update(Request $request, $name)
    {
            $permission = Permission::where('name', 'like', "%".$name."%")->first();
            $permission->advertising = $request->get('advertising');
            $permission->imformation = $request->get('imformation');
            $permission->fileroom = $request->get('fileroom');
            $permission->photealbum = $request->get('photealbum');
            $permission->page = $request->get('page');
            $permission->networklink = $request->get('networklink');
            $permission->auth = $request->get('auth');
            $permission->register = $request->get('register');
            $permission->positions = $request->get('positions');
            $permission->permission = $request->get('permission');
            $permission->setup = $request->get('setup');
            $permission->menus = $request->get('menus');
            $permission->website_information = $request->get('website_information');     
            $permission->keyword = $request->get('keyword');
            $permission->setupchange = $request->get('setupchange');                   
            $permission->save();
        return redirect('/permissions')->with('success', 'permission update!');
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
