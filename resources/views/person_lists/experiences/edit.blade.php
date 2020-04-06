@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >經驗編輯</h1>
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
    <!-- 有問題 -->
      <form method="post" action="{{ route('experiences.update', $experience->id) }}">
          @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="angency_name">機構名字:</label>
              <input type="text" class="form-control" name="angency_name" value={{ $experience->angency_name}} >
          </div>
          <div class="form-group">    
              <label for="angency">機構:</label>
              <input type="text" class="form-control" name="angency" value={{ $experience->agency}}>
          </div>
          <div class="form-group">    
              <label for="job_name">工作:</label>
              <input type="text" class="form-control" name="job_name" value={{ $experience->job_name}}>
          </div>
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $experience->start_date}}>
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{ $experience->end_date}}>
          </div>           
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $experience->website}}>
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{$experience->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection