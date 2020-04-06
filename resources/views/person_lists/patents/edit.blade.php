@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >專利編輯</h1>
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
      <form method="post" action="{{ route('patents.update',$patent->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="name">專利名:</label>
              <input type="text" class="form-control" name="name" value={{$patent->name}} >
          </div>
          <div class="form-group">    
              <label for="country">國家:</label>
              <input type="text" class="form-control" name="country" value={{$patent->country}}>
          </div>
          <div class="form-group">    
              <label for="owner">持有者:</label>
              <input type="text" class="form-control" name="owner" value={{$patent->owner}}>
          </div>
            <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{$patent->year}}>
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{'專利'}}" <?php echo ($patent->type == "專利" ? 'checked="checked"': ''); ?> >專利
              <input  type="radio"  name="type"  value="{{'技術轉移'}}" <?php echo ($patent->type == "技術轉移" ? 'checked="checked"': ''); ?> >技術轉移
              <input  type="radio"  name="type"  value="{{'學生專題製作競賽'}}" <?php echo ($patent->type == "學生專題製作競賽" ? 'checked="checked"': ''); ?> >學生專題製作競賽
          </div>   
          <div class="form-group">    
              <label for="number">數量:</label>
              <input type="text" class="form-control" name="number" value={{$patent->number}}>
          </div>
          <div class="form-group">    
              <label for="publish_schedule">發表歷程:</label>
              <input type="text" class="form-control" name="publish_schedule" value={{$patent->publish_schedule}}>
          </div>
            <div class="form-group">    
              <label for="publish_date">發行日期:</label>
              <input type="date" class="form-control" name="publish_date" value={{$patent->publish_date}}>
          </div>
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{$patent->start_date}}>
          </div>  
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{$patent->end_date}}>
          </div> 
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{$patent->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{$patent->file_path}}>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{$patent->website}}>
          </div>
          <div class="form-group">    
              <label for="language">語言:</label>
              <input  type="radio"  name="language"  value="{{'繁體中文'}}" <?php echo ($patent->type == "繁體中文" ? 'checked="checked"': ''); ?> >繁體中文
              <input  type="radio"  name="language"  value="{{'English'}}" <?php echo ($patent->type == "English" ? 'checked="checked"': ''); ?> >English
              <input  type="radio"  name="language"  value="{{'其他'}}" <?php echo ($patent->type == "其他" ? 'checked="checked"': ''); ?> >其他}
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{$patent->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection