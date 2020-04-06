@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增檔案</h1>
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
      <form method="post" action="{{ route('adphotes.update',$advertising->id) }}" enctype="multipart/form-data">
          @method('PATCH') 
          @csrf
          <div class="form-group">
              <label for="belong">屬於:</label>
              <input type="text" class="form-control" name="belong" value={{$advertising->title}} />
          </div>

          <div class="form-group">
              <label for="file">檔案路徑:</label>
              <input type="file" class="form-control" name="file">
          </div>     
 

          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection

