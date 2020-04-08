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
              <label for="name">活動名稱:</label>
              <input type="text" class="form-control" name="name"  >
          </div>
          <div class="form-group">    
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" >
          </div>
          <div class="form-group">    
              <label for="agency">機構:</label>
              <input type="text" class="form-control" name="agency" >
          </div>
          <div class="form-group">    
              <label for="job_title">工作名稱:</label>
              <input type="text" class="form-control" name="job_title" >
          </div>          
          <div class="form-group">    
              <label for="publish_agency">公家機構:</label>
              <input type="text" class="form-control" name="publish_agency" >
          </div>
          <div class="form-group">    
              <label for="brief">簡介:</label>
              <textarea class="form-control" name="brief" >{{ $activity->brief }}</textarea>
          </div>   
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" >
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{ '展演' }}"  >展演
              <input  type="radio"  name="type"  value="{{ '演講' }}"  >演講
              <input  type="radio"  name="type"  value="{{ '研討會' }}"  >研討會
          </div>
            <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" >
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" >
          </div>  
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" >
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" >
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" >
          </div>
            <div class="form-group">    
              <label for="position">地點:</label>
              <input type="text" class="form-control" name="position" >
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" ></textarea>
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