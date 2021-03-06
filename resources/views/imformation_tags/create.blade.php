@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增類別</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('imformation_tags.store') }}">
          @csrf
          <div class="form-group">    
              <label for="tag">中文:</label>
              <input type="text" class="form-control" name="tag">
              <label for="tag_english">english:</label>
              <input type="text" class="form-control" name="tag_english">
          </div>                      
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection