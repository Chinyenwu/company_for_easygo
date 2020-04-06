@extends('layouts.setup')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>新增架構</h1>
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
      <form method="post" action="{{ route('menus.store') }}" enctype="multipart/form-data">
          @method('post') 
          @csrf
          <div class="form-group" style="display: none;">
              <label for="uniquename">層數</label>
              <input type="text" class="form-control" name="layer" value={{$layer}}>
          </div>

          <div class="form-group" style="display: none;">
              <label for="uniquename">順序</label>
              <input type="text" class="form-control" name="sort" value={{$sort}}>
          </div>                    

          <div class="form-group" style="display: none;">
              <label for="uniquename">父母</label>
              <input type="text" class="form-control" name="parent" value={{$parent}}>
          </div> 

          <div class="form-group">
              <label for="uniquename">ID:</label>
              <input type="text" class="form-control" name="uniquename" >
          </div>

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" >
          </div>     
 

          <button type="submit" class="btn btn-primary">新增</button>
      </form>
    </div>

@endsection