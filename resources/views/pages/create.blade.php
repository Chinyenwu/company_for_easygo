@extends('layouts.app')

@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增頁面</h1>
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
      <form method="post" action="{{ route('pages.store') }}">
          @csrf
          <div class="form-group">
              <label for="class">類別:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <?php $page_classes = DB::table('page_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($page_classes as $page_class)
                  <option value="{{$page_class->class}}">{{$page_class->class}}</option>
                  @endforeach
              </select>    
          </div>
          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title">
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context"></textarea>
          </div>           
      <script>
        CKEDITOR.replace( "context" );
      </script>        

          <div class="form-group" style="display:none">
              <label for="person">編輯人:</label>
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

