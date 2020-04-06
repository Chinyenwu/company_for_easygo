@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >專案編輯</h1>
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
      <form method="post" action="{{ route('projects.update',$project->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="project_name">專案名稱:</label>
              <input type="text" class="form-control" name="project_name" value={{$project->project_name}} >
          </div>
          <div class="form-group">    
              <label for="job">工作名稱:</label>
              <input type="text" class="form-control" name="job" value={{$project->job}}>
          </div>
          <div class="form-group">    
              <label for="join_people">參與人員:</label>
              <input type="text" class="form-control" name="join_people" value={{$project->join_people}}>
          </div>
          <div class="form-group">    
              <label for="mechanism">機構:</label>
              <input type="text" class="form-control" name="mechanism" value={{$project->mechanism}}>
          </div>
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{$project->year}}>
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{'研究計畫'}}" <?php echo ($project->type == "研究計畫" ? 'checked="checked"': ''); ?> >研究計畫
              <input  type="radio"  name="type"  value="{{'產學合作計畫'}}" <?php echo ($project->type == "產學合作計畫" ? 'checked="checked"': ''); ?> >產學合作計畫
          </div>   
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{$project->start_date}}>
          </div>  
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{$project->end_date}}>
          </div> 
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{$project->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{$project->file_path}}>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{$project->website}}>
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{$project->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection