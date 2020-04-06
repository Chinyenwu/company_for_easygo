@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >專書編輯</h1>
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
      <form method="post" action="{{ route('special_books.update',$special_book->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="name">書名:</label>
              <input type="text" class="form-control" name="name" value={{ $special_book->name}} >
          </div>
          <div class="form-group">    
              <label for="chapter">章節:</label>
              <input type="text" class="form-control" name="chapter" value={{ $special_book->chapter}}>
          </div>
          <div class="form-group">    
              <label for="main_editer">主編:</label>
              <input type="text" class="form-control" name="main_editer" value={{ $special_book->main_editer}}>
          </div>
          <div class="form-group">    
              <label for="publish_club">出版社:</label>
              <input type="text" class="form-control" name="publish_club" value={{ $special_book->publish_club}}>
          </div>
          <div class="form-group">    
              <label for="publish_position">發表地點:</label>
              <input type="text" class="form-control" name="publish_position" value={{ $special_book->publish_position}}>
          </div>
          <div class="form-group">    
              <label for="all_editer">全部作者:</label>
              <input type="text" class="form-control" name="all_editer" value={{ $special_book->all_editer}}>
          </div>   
          <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $special_book->year}}>
          </div>
          <div class="form-group">    
              <label for="date">類別:</label>
              <input type="text" class="form-control" name="date" value={{ $special_book->date}}>
          </div>
          <div class="form-group">    
              <label for="page">等級:</label>
              <input type="text" class="form-control" name="page" value={{ $special_book->page}}>
          </div>
          <div class="form-group">    
              <label for="editer_number">作者人數:</label>
              <input type="text" class="form-control" name="editer_number" value={{ $special_book->editer_number}}>
          </div>
          <div class="form-group">    
              <label for="editer_type">作者型態:</label>
              <input  type="radio"  name="editer_type"  value="{{'First Author'}}" <?php echo ($special_book->editer_type == "First Author" ? 'checked="checked"': ''); ?> >First Author
              <input  type="radio"  name="editer_type"  value="{{'Corresponding Author'}}" <?php echo ($special_book->editer_type == "Corresponding Author" ? 'checked="checked"': ''); ?> >Corresponding Author
              <input  type="radio"  name="editer_type"  value="{{'Other'}}" <?php echo ($special_book->editer_type == "Other" ? 'checked="checked"': ''); ?> >Other   
          </div>
          <div class="form-group">    
              <label for="ISSN">ISSN:</label>
              <input type="text" class="form-control" name="ISSN" value={{ $special_book->ISSN}}>
          </div>
          <div class="form-group">    
              <label for="ISI_Number">ISI_Number:</label>
              <input type="text" class="form-control" name="ISI_Number" value={{ $special_book->ISI_Number}}>
          </div>  
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{ $special_book->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{ $special_book->file_path}}>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $special_book->website}}>
          </div>
            <div class="form-group">    
              <label for="language">語言:</label>
              <input  type="radio"  name="language"  value="{{'繁體中文'}}" <?php echo ($special_book->language == "繁體中文" ? 'checked="checked"': ''); ?> >繁體中文
              <input  type="radio"  name="language"  value="{{'English'}}" <?php echo ($special_book->language == "繁體中文" ? 'checked="checked"': ''); ?> >English
              <input  type="radio"  name="language"  value="{{'其他'}}" <?php echo ($special_book->language == "繁體中文" ? 'checked="checked"': ''); ?> >其他
          </div>
          <div class="form-group">    
              <label for="project_name">專案名稱:</label>
              <input type="text" class="form-control" name="project_name" value={{ $special_book->project_name}}>
          </div>  
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{ $special_book->remark}}</textarea>
          </div>                             
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection