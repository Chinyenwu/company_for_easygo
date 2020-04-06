@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>系統偏好</h1>
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
        <form method="post" action="{{ route('keywords.store') }}">
            @method('post') 
            @csrf
          <div class="form-group">
              <label for="google">Google分析碼:</label>
              <textarea id="google" class="form-control" name="google" >{{ $keyword->google }}</textarea>
          </div>  

          <div class="form-group">
              <label for="keyword">網站關鍵字:</label>
              <textarea id="keyword" class="form-control" name="keyword" >{{ $keyword->keyword }}</textarea>
          </div>    

          <div class="form-group">
              <label for="describe">網站描述:</label>
              <textarea id="describe" class="form-control" name="describe" >{{ $keyword->describe }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>
@endsection