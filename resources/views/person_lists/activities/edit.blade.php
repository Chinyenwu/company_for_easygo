@extends('layouts.member') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >活動編輯</h1>

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
        <form method="post" action="{{ route('activities.update', $activity->id) }}">
            @method('PATCH') 
            @csrf
          <div class="form-group">
              <label for="name">活動類別:</label>

          </div>
          <div class="form-group">    
              <label for="name">活動名稱:</label>
              <input type="text" class="form-control" name="name" value={{ $activity->name }} >
          </div>
          <div class="form-group">    
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $activity->title }}>
          </div>
          <div class="form-group">    
              <label for="agency">機構:</label>
              <input type="text" class="form-control" name="agency" value={{ $activity->agency }}>
          </div>
          <div class="form-group">    
              <label for="job_title">工作名稱:</label>
              <input type="text" class="form-control" name="job_title" value={{ $activity->job_title }}>
          </div>          
          <div class="form-group">    
              <label for="publish_agency">公家機構:</label>
              <input type="text" class="form-control" name="publish_agency" value={{ $activity->publish_agency }}>
          </div>
          <div class="form-group">    
              <label for="brief">簡介:</label>
              <textarea class="form-control" name="brief" >{{ $activity->brief }}</textarea>
          </div>   
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $activity->year }}>
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{ '展演' }}" <?php echo ($activity->type == "展演" ? 'checked="checked"': ''); ?> >展演
              <input  type="radio"  name="type"  value="{{ '演講' }}" <?php echo ($activity->type == "演講" ? 'checked="checked"': ''); ?> >演講
              <input  type="radio"  name="type"  value="{{ '研討會' }}" <?php echo ($activity->type == "研討會" ? 'checked="checked"': ''); ?> >研討會
          </div>
            <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $activity->start_date }}>
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{ $activity->end_date }}>
          </div>  
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{ $activity->file }}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{ $activity->file_path }}>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $activity->website }}>
          </div>
            <div class="form-group">    
              <label for="position">地點:</label>
              <input type="text" class="form-control" name="position" value={{ $activity->position }}>
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{$activity->remark}}</textarea>
          </div> 

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


