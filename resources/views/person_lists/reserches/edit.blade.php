@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >研究編輯</h1>
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
      <form method="post" action="{{ route('reserches.update',$reserch->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="name">研究名字:</label>
              <input type="text" class="form-control" name="name" value={{ $reserch->name}} >
          </div>
          <div class="form-group">    
              <label for="brief">簡介:</label>
              <input type="text" class="form-control" name="brief" value={{ $reserch->brief}}>
          </div>
          <div class="form-group">    
              <label for="all_editer">全部作者:</label>
              <input type="text" class="form-control" name="all_editer" value={{ $reserch->all_editer}}>
          </div>
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $reserch->year}}>
          </div>
          <div class="form-group">    
              <label for="type">種類:</label>
              <input  type="radio"  name="type"  value="{{'內校研究'}}" <?php echo ($reserch->type == "內校研究" ? 'checked="checked"': ''); ?>>內校研究
              <input  type="radio"  name="type"  value="{{'外校研究'}}" <?php echo ($reserch->type == "外校研究" ? 'checked="checked"': ''); ?>>外校研究
          </div> 
          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $reserch->start_date}}>
          </div>                   
          <div class="form-group">    
              <label for="file">檔案名:</label>
              <input type="text" class="form-control" name="file" value={{ $reserch->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{ $reserch->file_path}}>
          </div>  
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $reserch->website}}>
          </div>
          <div class="form-group">    
              <label for="language">語言:</label>
              <input  type="radio"  name="type"  value="{{'繁體中文'}}" <?php echo ($reserch->type == "繁體中文" ? 'checked="checked"': ''); ?>>繁體中文
              <input  type="radio"  name="type"  value="{{'English'}}" <?php echo ($reserch->type == "English" ? 'checked="checked"': ''); ?>>English    
              <input  type="radio"  name="type"  value="{{'其他'}}" <?php echo ($reserch->type == "其他" ? 'checked="checked"': ''); ?>>其他   
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{ $reserch->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection