@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增職稱</h1>
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
      <form method="post" action="{{ route('positions.store') }}">
          @csrf
          <div class="form-group">    
              <label for="class">職務性質:</label>
              <input id="class" type="radio"  name="class" value="{{ '教師' }}" >教師
              <input id="class" type="radio"  name="class" value="{{ '行政人員' }}" >行政人員
          </div>
          <div class="form-group">    
              <label for="position">職務名稱:</label>
              <input type="text" class="form-control" name="position"/>
          </div>                                
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection