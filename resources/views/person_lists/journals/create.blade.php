@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">新增期刊</h1>
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
      <form method="post" action="{{ route('journals.store') }}">
          @csrf
          <div class="form-group">    
              <label for="speech_name">演講名稱:</label>
              <input type="text" class="form-control" name="speech_name">
          </div>
          <div class="form-group">    
              <label for="journal_name">期刊名稱:</label>
              <input type="text" class="form-control" name="journal_name">
          </div>
          <div class="form-group">    
              <label for="all_editer">所有作者:</label>
              <input type="text" class="form-control" name="all_editer">
          </div>
          <div class="form-group">
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year">
          </div>
          <div class="form-group">    
              <label for="level">等級:</label>
              <input  type="radio"  name="level"  value="{{ 'SCI' }}" >SCI
              <input  type="radio"  name="level"  value="{{ 'SSCI' }}" >SSCI
              <input  type="radio"  name="level"  value="{{ 'EI' }}" >EI
              <input  type="radio"  name="level"  value="{{ 'AHCI' }}" >AHCI
              <input  type="radio"  name="level"  value="{{ 'TSSCI' }}" >TSSCI
              <input  type="radio"  name="level"  value="{{ '其他' }}" >其他             
          </div>   
          <div class="form-group">    
              <label for="date">日期:</label>
              <input type="text" class="form-control" name="date">
          </div>
          <div class="form-group">    
              <label for="book_number">書號:</label>
              <input type="text" class="form-control" name="book_number">
          </div>
            <div class="form-group">    
              <label for="journal_number">刊號:</label>
              <input type="text" class="form-control" name="journal_number">
          </div>
          <div class="form-group">    
              <label for="page">頁數:</label>
              <input type="text" class="form-control" name="page">
          </div>  
          <div class="form-group">    
              <label for="editer_number">作者人數:</label>
              <input type="text" class="form-control" name="editer_number">
          </div>   
          <div class="form-group">    
              <label for="editer_type">作者型態:</label>
              <input  type="radio"  name="editer_type"  value="{{'First Author'}}" >First Author
              <input  type="radio"  name="editer_type"  value="{{'Corresponding Author'}}" >Corresponding Author
              <input  type="radio"  name="editer_type"  value="{{'Other'}}" >Other
          </div>
          <div class="form-group">    
              <label for="ISSN">ISSN:</label>
              <input type="text" class="form-control" name="ISSN">
          </div>
            <div class="form-group">    
              <label for="ISI_Number">ISI_Number:</label>
              <input type="text" class="form-control" name="ISI_Number">
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