@extends('layouts.setup')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>網站架構</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <?php $menus1 = DB::table('menuslist')->where('layer','1')->orderBy('sort', 'asc')->get()?>
        <?php $last1 = DB::table('menuslist')->where('layer','1')->orderBy('sort', 'desc')->first()?>
        <ul>
        <div class="card">
          <div class="card-header">
            首頁
            <form action="" method="post" style="float: right;">
                <button class="btn btn-default" type="submit">模板</button>
            </form>
            <!--<form action="" method="post" style="float: right;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">刪除</button>
            </form>-->
            <form action="" method="post" style="float: right;">
                @method('get')
                @csrf
                <button class="btn btn-info" type="submit">編輯</button>
            </form>
            <form action="{{ route('menus.create') }}" method="get" style="float: right;">
                @method('get')
                @csrf
                <input type="text" class="form-control" name="layer" value = "1" style="display: none;">
                <input type="text" class="form-control" name="sort" value = {{$last1->sort+1}} style="display: none;">
                <input type="text" class="form-control" name="parent" value = "home" style="display: none;">
                <button class="btn btn-success" type="submit">新增</button>
            </form>
            <form action="" method="post" style="float: right;">
                <button class="btn btn-warning" type="submit">預覽</button>
            </form>
          </div>
        <ul>          
        @foreach($menus1 as $menu)
        <!--<?php //var_dump($menu->uniquename);?>-->
        <?php $last2=DB::table('menuslist')->where('parent',$menu->uniquename)->orderBy('sort', 'desc')->first()?>
        <div class="card">
          <div class="card-header">
            {{$menu->title}}
            <form action="" method="post" style="float: right;">
                <button class="btn btn-default" type="submit">模板</button>
            </form>
            <form action="{{ route('menus.destroy', $menu->id)}}" method="post" style="float: right;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">刪除</button>
            </form>
            <form action="{{ route('menus.edit', $menu->id)}}" method="post" style="float: right;">
                @method('get')
                @csrf
                <button class="btn btn-info" type="submit">編輯</button>
            </form>
            <form action="{{ route('menus.create') }}" method="get" style="float: right;">
                @method('get') 
                @csrf
                <input type="text" class="form-control" name="layer" value = "2" style="display: none;">
                @if ($last2 == NULL)
                <input type="text" class="form-control" name="sort" value = "1" style="display: none;">
                @else
                <input type="text" class="form-control" name="sort" value = {{$last2->sort+1}} style="display: none;">                                
                @endif
                <input type="text" class="form-control" name="parent" value = {{$menu->uniquename}} style="display: none;">
                <button class="btn btn-success" type="submit">新增</button>
            </form>
            <form action="" method="post" style="float: right;">
                <button class="btn btn-warning" type="submit">預覽</button>
            </form>
          </div>          
        <?php $menus2 = DB::table('menuslist')->where('parent',$menu->uniquename)->get()?>
        <ul>
        @foreach($menus2 as $menu_2)
        <?php $last3=DB::table('menuslist')->where('parent',$menu_2->uniquename)->orderBy('sort', 'desc')->first()?>
        <div class="card">
          <div class="card-header">
            {{$menu_2->title}}
            <form action="" method="post" style="float: right;">
                <button class="btn btn-default" type="submit">模板</button>
            </form>
            <form action="{{ route('menus.destroy', $menu_2->id)}}" method="post" style="float: right;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">刪除</button>
            </form>
            <form action="{{ route('menus.edit', $menu_2->id)}}" method="post" style="float: right;">
                @method('get')
                @csrf
                <button class="btn btn-info" type="submit">編輯</button>
            </form>
            <form action="{{ route('menus.create') }}" method="get" style="float: right;">
                @method('get') 
                @csrf
                <input type="text" class="form-control" name="layer" value = "3" style="display: none;">
                @if ($last3 == NULL)
                <input type="text" class="form-control" name="sort" value = "1" style="display: none;">
                @else
                <input type="text" class="form-control" name="sort" value = {{$last3->sort+1}} style="display: none;">                                
                @endif
                <input type="text" class="form-control" name="parent" value = {{$menu_2->uniquename}} style="display: none;">                
                <button class="btn btn-success" type="submit">新增</button>
            </form>
            <form action="" method="post" style="float: right;">
                <button class="btn btn-warning" type="submit">預覽</button>
            </form>
          </div>
          <?php $menus3 = DB::table('menuslist')->where('parent',$menu_2->uniquename)->get()?>
          <ul>
          @foreach($menus3 as $menu_3)
          <div class="card">
          <div class="card-header">
            {{$menu_3->title}}
            <form action="" method="post" style="float: right;">
                <button class="btn btn-default" type="submit">模板</button>
            </form>
            <form action="{{ route('menus.destroy', $menu_3->id)}}" method="post" style="float: right;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">刪除</button>
            </form>
            <form action="{{ route('menus.edit', $menu_3->id)}}" method="post" style="float: right;">
                @method('get')
                @csrf
                <button class="btn btn-info" type="submit">編輯</button>
            </form>
            <form action="" method="post" style="float: right;">
                <button class="btn btn-warning" type="submit">預覽</button>
            </form>
          </div>
          </div>
          @endforeach
          </ul>          
        </div>
        @endforeach
        </ul>
        </div>
       @endforeach
        </ul>
        </div>
        </ul>
    </div>
</div>
@endsection
