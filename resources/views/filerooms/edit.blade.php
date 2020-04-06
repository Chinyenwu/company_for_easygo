@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >編輯檔案</h1>

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
        <form method="post" action="{{ route('filerooms.update', $fileroom->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="class">類別:</label>
              <?php $fileroom_classes = DB::table('fileroom_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($fileroom_classes as $fileroom_class)
                  <option value="{{$fileroom_class->class}}" <?php echo ($fileroom->class == $fileroom_class->class ? 'selected="selected"': ''); ?> >{{$fileroom_class->class}}</option>
                  @endforeach
              </select> 
          </div>

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $fileroom->title }} >
          </div>

          <!--<div class="form-group">
              <label for="filename">檔案名稱:</label>
              <input type="text" class="form-control" name="filename" value={{ $fileroom->filename }}>
          </div>-->

          <div class="form-group">
              <label for="file_path">檔案路徑:</label>
              <input type="file" class="form-control" name="file_path" value={{ $fileroom->file_path }}>
          </div>    

          <div class="form-group" style="display:none">
              <label for="editer">編輯人:</label>
              <input type="text" class="form-control" name="editer" value={{ Auth::user()->name }} >
          </div>

          <div class="form-group" style="display:none">    
              <label for="start_date">編輯日期:</label>
              <input type="date" class="form-control" name="edit_time" value="{{date('Y-m-d')}}" >
          </div>  
            <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


