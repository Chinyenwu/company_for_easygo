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
      <form method="post" action="{{ route('filerooms.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="class">類別:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <?php $fileroom_classes = DB::table('fileroom_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($fileroom_classes as $fileroom_class)
                  <option value="{{$fileroom_class->class}}">{{$fileroom_class->class}}</option>
                  @endforeach
              </select>    
          </div>
          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title">
          </div>

          <!--<div class="form-group">
              <label for="filename">檔案名稱:</label>
              <input type="text" class="form-control" name="filename">
          </div>-->

          <div class="form-group">
              <label for="file_path">檔案路徑:</label>
              <input type="file" class="form-control" name="file_path">
          </div>     

          <div class="form-group" style="display:none">
              <label for="editer">編輯人:</label>
              <input type="text" class="form-control" name="editer" value="{{ Auth::user()->name }}">
          </div>

          <div class="form-group" style="display:none">    
              <label for="start_date">編輯日期:</label>
              <input type="date" class="form-control" name="edit_time" value="{{date('Y-m-d')}}" >
          </div>  

          <button type="submit" class="btn btn-primary">新增頁面</button>
      </form>
  </div>

</div>
</div>
@endsection

