@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增檔案</h1>
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
      <form method="post" action="{{ route('adphotes.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="belong">屬於:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <?php $advertisings = DB::table('advertisings')->get();?>
              <select class="form-control" name="belong" >
                  @foreach($advertisings as $advertising)
                  <option value="{{$advertising->title}}">{{$advertising->title}}</option>
                  @endforeach
              </select>    
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

