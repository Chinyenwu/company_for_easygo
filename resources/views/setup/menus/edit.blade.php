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

      <form method="post" action="{{ route('menus.update', $menu->id) }}" >
          @method('PATCH') 
          @csrf

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{$menu->title}}>
          </div>     
 

          <button type="submit" class="btn btn-primary">新增</button>
      </form>
    </div>

@endsection