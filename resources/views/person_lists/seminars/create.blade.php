@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增研討會</h1>
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
      <form method="post" action="{{ route('seminars.store') }}">
          @csrf
          <div class="form-group">    
              <label for="speech_name">論文名稱:</label>
              <input type="text" class="form-control" name="speech_name">
          </div>
          <div class="form-group">    
              <label for="meeting_name">會議名稱:</label>
              <input type="text" class="form-control" name="meeting_name">
          </div>
          <div class="form-group">    
              <label for="position">地點:</label>
              <input type="text" class="form-control" name="position">
          </div>
            <div class="form-group">    
              <label for="agency">機構:</label>
              <input type="text" class="form-control" name="agency">
          </div>
          <div class="form-group">    
              <label for="all_editer">全部作者:</label>
              <input type="text" class="form-control" name="all_editer">
          </div>   
          <div class="form-group">
              <label for="year">年度:</label>
              <input type="text" class="form-control" name="year">
          </div>
          <div class="form-group">    
              <label for="type">類別:</label>
              <input  type="radio"  name="type"  value="{{'口頭報告'}}" >口頭報告
              <input  type="radio"  name="type"  value="{{'會議論文'}}" >會議論文    
              <input  type="radio"  name="type"  value="{{'受邀演講'}}" >受邀演講
              <input  type="radio"  name="type"  value="{{'海報展示'}}" >海報展示
              <input  type="radio"  name="type"  value="{{'壁報論文'}}" >壁報論文    
              <input  type="radio"  name="type"  value="{{'其他'}}" >其他 
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
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div>  
          <div class="form-group">    
              <label for="publish_year">發表年度:</label>
              <select class="form-control" name="year" >
                  <option value="2020">2020</option>
                  <option value="2019">2019</option>
                  <option value="2018">2018</option>
                  <option value="2017">2017</option>
                  <option value="2016">2016</option>
                  <option value="2015">2015</option>
                  <option value="2014">2014</option>
                  <option value="2013">2013</option>
                  <option value="2012">2012</option>
                  <option value="2011">2011</option>
                  <option value="2010">2010</option>
                  <option value="2009">2009</option>
                  <option value="2008">2008</option>
                  <option value="2007">2007</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
              </select> 
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
              <label for="project_name">專案名稱:</label>
              <input type="text" class="form-control" name="project_name">
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