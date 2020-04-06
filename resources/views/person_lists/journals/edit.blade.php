@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">期刊編輯</h1>
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
      <form method="post" action="{{ route('journals.update',$journal->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">    
              <label for="speech_name">演講名稱:</label>
              <input type="text" class="form-control" name="speech_name" value={{ $journal->speech_name}} >
          </div>
          <div class="form-group">    
              <label for="journal_name">期刊名稱:</label>
              <input type="text" class="form-control" name="journal_name" value={{ $journal->journal_name}}>
          </div>
          <div class="form-group">    
              <label for="all_editer">所有作者:</label>
              <input type="text" class="form-control" name="all_editer" value={{ $journal->all_editer}}>
          </div>
            <div class="form-group">    
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year" value={{ $journal->year}}>
          </div>
          <div class="form-group">    
              <label for="level">等級:</label>
              <input  type="radio"  name="level"  value="{{ 'SCI' }}" <?php echo ($journal->level == "SCI" ? 'checked="checked"': ''); ?> >SCI
              <input  type="radio"  name="level"  value="{{ 'SSCI' }}" <?php echo ($journal->level == "SSCI" ? 'checked="checked"': ''); ?> >SSCI
              <input  type="radio"  name="level"  value="{{ 'EI' }}" <?php echo ($journal->level == "EI" ? 'checked="checked"': ''); ?> >EI
              <input  type="radio"  name="level"  value="{{ 'AHCI' }}" <?php echo ($journal->level == "AHCI" ? 'checked="checked"': ''); ?> >AHCI
              <input  type="radio"  name="level"  value="{{ 'TSSCI' }}" <?php echo ($journal->level == "TSSCI" ? 'checked="checked"': ''); ?> >TSSCI
              <input  type="radio"  name="level"  value="{{ '其他' }}" <?php echo ($journal->level == "其他" ? 'checked="checked"': ''); ?> >其他 
          </div>   
          <div class="form-group">    
              <label for="date">日期:</label>
              <input type="text" class="form-control" name="date" value={{ $journal->date}}>
          </div>
          <div class="form-group">    
              <label for="book_number">書號:</label>
              <input type="text" class="form-control" name="book_number" value={{ $journal->book_number}}>
          </div>
            <div class="form-group">    
              <label for="journal_number">刊號:</label>
              <input type="text" class="form-control" name="journal_number" value={{ $journal->journal_number}}>
          </div>
          <div class="form-group">    
              <label for="page">頁數:</label>
              <input type="text" class="form-control" name="page" value={{ $journal->page}}>
          </div>  
          <div class="form-group">    
              <label for="editer_number">作者人數:</label>
              <input type="text" class="form-control" name="editer_number" value={{ $journal->editer_number}}>
          </div>   
          <div class="form-group">    
              <label for="editer_type">作者型態:</label>
              <input  type="radio"  name="editer_type"  value="{{'First Author'}}" <?php echo ($journal->editer_type == "First Author" ? 'checked="checked"': ''); ?> >First Author
              <input  type="radio"  name="editer_type"  value="{{'Corresponding Author'}}" <?php echo ($journal->editer_type == "Corresponding Author" ? 'checked="checked"': ''); ?> >Corresponding Author
              <input  type="radio"  name="editer_type"  value="{{'Other'}}" <?php echo ($journal->editer_type == "Other" ? 'checked="checked"': ''); ?> >Other
          </div>
          <div class="form-group">    
              <label for="ISSN">ISSN:</label>
              <input type="text" class="form-control" name="ISSN" value={{ $journal->ISSN}}>
          </div>
            <div class="form-group">    
              <label for="ISI_Number">ISI_Number:</label>
              <input type="text" class="form-control" name="ISI_Number" value={{ $journal->ISI_Number}}>
          </div>
          <div class="form-group">    
              <label for="file">檔案名稱:</label>
              <input type="text" class="form-control" name="file" value={{ $journal->file}}>
          </div>
          <div class="form-group">    
              <label for="file_path">檔案路徑:</label>
              <input type="text" class="form-control" name="file_path" value={{ $journal->file_path}}>
          </div>
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $journal->website}}>
          </div>
            <div class="form-group">    
              <label for="language">語言:</label>
              <input  type="radio"  name="language"  value="{{'繁體中文'}}" <?php echo ($journal->language == "繁體中文" ? 'checked="checked"': ''); ?> >繁體中文
              <input  type="radio"  name="language"  value="{{'English'}}" <?php echo ($journal->language == "English" ? 'checked="checked"': ''); ?> >English
              <input  type="radio"  name="language"  value="{{'其他'}}" <?php echo ($journal->language == "其他" ? 'checked="checked"': ''); ?> >其他
          </div> 
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{$journal->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection