@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增專案</h1>
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
      <form method="post" action="{{ route('projects.store') }}">
          @csrf
          <div class="form-group">    
              <label for="project_name">專案名稱:</label>
              <input type="text" class="form-control" name="project_name">
          </div>
          <div class="form-group">    
              <label for="job">工作名稱:</label>
              <input type="text" class="form-control" name="job">
          </div>
          <div class="form-group">    
              <label for="join_people">參與人員:</label>
              <input type="text" class="form-control" name="join_people">
          </div>
          <div class="form-group">    
              <label for="mechanism">機構:</label>
              <input type="text" class="form-control" name="mechanism">
          </div>
          <div class="form-group">
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year">
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{'研究計畫'}}" >研究計畫
              <input  type="radio"  name="type"  value="{{'產學合作計畫'}}" >產學合作計畫
          </div>   
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>  
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div> 
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file">
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path">
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website">
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark"></textarea>
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