@extends('layouts.member')
@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增活動</h1>
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
      <form method="post" action="{{ route('activities.store') }}">
          @csrf
          <div class="form-group">    
              <label for="class">活動類別:</label>
              <?php $activity_classes = DB::table('activity_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($activity_classes as $activity_class)
                  <option value="{{$activity_class->class}}">{{$activity_class->class}}</option>
                  @endforeach
              </select>
          </div>          
          <div class="form-group">    
              <label for="signup_start_date">報名起始日期:</label>
              <input type="date" class="form-control" name="signup_start_date" value = "{{date('Y-m-d')}}">
          </div>
          <div class="form-group">    
              <label for="signup_end_date">報名結束日期:</label>
              <input type="date" class="form-control" name="signup_end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div>  
          <div class="form-group">    
              <label for="start_date">活動起始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>
          <div class="form-group">    
              <label for="end_date">活動結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div> 
          <div class="form-group">    
              <label for="name">活動名稱:</label>
              <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">    
              <label for="position">地點:</label>
              <input type="text" class="form-control" name="position">
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark"></textarea>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website">
          </div> 
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file">
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path">
          </div>
          <div class="form-group" style="display: none;">    
              <label for="person">持有人:</label>
              <input type="text" class="form-control" name="person" value={{$user->name}}>
          </div>   

          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection