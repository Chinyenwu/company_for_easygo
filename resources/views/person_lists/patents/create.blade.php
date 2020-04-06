@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增專利</h1>
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
      <form method="post" action="{{ route('patents.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">專利名:</label>
              <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">    
              <label for="country">國家:</label>
              <input type="text" class="form-control" name="country">
          </div>
          <div class="form-group">    
              <label for="owner">持有者:</label>
              <input type="text" class="form-control" name="owner">
          </div>
          <div class="form-group">
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year">
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{'專利'}}" >專利
              <input  type="radio"  name="type"  value="{{'技術轉移'}}" >技術轉移
              <input  type="radio"  name="type"  value="{{'學生專題製作競賽'}}" >學生專題製作競賽
          </div>   
          <div class="form-group">    
              <label for="number">數量:</label>
              <input type="text" class="form-control" name="number">
          </div>
          <div class="form-group">    
              <label for="publish_schedule">發表歷程:</label>
              <input type="text" class="form-control" name="publish_schedule">
          </div>
            <div class="form-group">    
              <label for="publish_date">發行日期:</label>
              <input type="date" class="form-control" name="publish_date" value = "{{date('Y-m-d')}}">
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
              <label for="language">語言:</label>
              <input  type="radio"  name="language"  value="{{'繁體中文'}}" >繁體中文
              <input  type="radio"  name="language"  value="{{'English'}}" >English
              <input  type="radio"  name="language"  value="{{'其他'}}" >其他
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea  class="form-control" name="remark"></textarea>
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