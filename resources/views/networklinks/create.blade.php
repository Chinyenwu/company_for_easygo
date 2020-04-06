@extends('layouts.app')
@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增公告</h1>
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
      <form method="post" action="{{ route('networklinks.store') }}">
          @csrf
          <div class="form-group">
              <label for="class">類別:</label>
              <?php $imformation_classes = DB::table('networklink_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($networklink_classes as $networklink_class)
                  <option value="{{$networklink_class->class}}">{{$networklink_class->class}}</option>
                  @endforeach
              </select>    
          </div>

          <div class="form-group">    
              <label for="title">標題:</label>
              <input type="date" class="form-control" name="title">
          </div>

          <div class="form-group">
              <label for="content">內容:</label>
              <input type="date" class="form-control" name="content">
          </div>

          <div class="form-group">
              <label for="link">網址:</label>
              <input type="text" class="form-control" name="link">
          </div>

          <div class="form-group">
              <label for="way">開啟方式:</label>
              <input type="text" class="form-control" name="way">
          </div>

          <div class="form-group" style="display:none">
              <label for="editer">編輯人:</label>
              <input type="text" class="form-control" name="editer" value="{{ Auth::user()->name }}">
          </div>
 
          <button type="submit" class="btn btn-primary">新增公告</button>
      </form>
  </div>
</div>

</div>
@endsection

