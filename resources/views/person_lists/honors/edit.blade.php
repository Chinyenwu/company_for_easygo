@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >榮譽編輯</h1>
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
      <form method="post" action="{{ route('honors.update',$honor->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="name">名字:</label>
              <input type="text" class="form-control" name="name" value={{ $honor->name}} >
          </div>
          <div class="form-group">    
              <label for="agency">機構:</label>
              <input type="text" class="form-control" name="agency" value={{ $honor->agency}}>
          </div>
          <div class="form-group">    
              <label for="country">國家:</label>
              <input type="text" class="form-control" name="country" value={{ $honor->country}}>
          </div>
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $honor->year}}>
          </div>
          <div class="form-group">    
              <label for="type">種類:</label>
              <input type="text" class="form-control" name="type" value={{ $honor->type}}>
          </div>          
          <div class="form-group">    
              <label for="file">檔案名:</label>
              <input type="text" class="form-control" name="file" value={{ $honor->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{ $honor->file_path}}>
          </div>  
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $honor->website}}>
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{ $honor->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection