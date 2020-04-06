@extends('layouts.app')
@section('content')

<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增公告</h1>
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
      <form method="post" action="{{ route('imformations.store') }}" enctype="multipart/form-data">
          <button type="button" class="btn btn-primary" style="display:inline;" id="basic">基本</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="status">狀態</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="tags">標籤</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="image">圖片</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="email">寄件提醒</button>

          @csrf
          <div id="information_basic">
          <div class="form-group">
              <label for="class">類別:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <?php $imformation_classes = DB::table('imformation_classes')->get();?>
              <select class="form-control" name="class">
                  @foreach($imformation_classes as $imformation_class)
                  <option value="{{$imformation_class->class}}" name="class">{{$imformation_class->class}}</option>
                  @endforeach
              </select>

          </div>

          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>
          <div class="form-group">
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div>
          </div>

          <div id="information_status" style="display:none">
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="top">置頂
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="hot">熱門
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="disable">隱藏
          </div>

          <div id="information_tags" style="display:none">
              <?php $imformation_tags = DB::table('imformation_tags')->get();?>
              @foreach($imformation_tags as $imformation_tag)
                <input type="checkbox" name="tag[]" style="display:inline-flex;" value="{{$imformation_tag->tag}}">{{$imformation_tag->tag}}
              @endforeach
          </div>
          
          <div id="information_image" style="display:none">
              <label for="Image_file">封面圖:</label>
              <input type="file" class="form-control" name="Image_file">
              <label for="Image_description_chin">圖片描述(中文):</label>
              <input type="text" class="form-control" name="Image_description_chin">
              <label for="Image_description_eng">圖片描述(英文):</label>
              <input type="text" class="form-control" name="Image_description_eng">   
          </div>

          <div id="information_email" style="display:none">
              <label>寄件提醒</label>
          </div>

          <button type="button" class="btn btn-primary" style="display:inline;" id="chinese">中文</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="english">English</button>
          <div id="information_chinese">

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title">
          </div>

          <div class="form-group">
              <label for="second_title">副標題:</label>
              <input type="text" class="form-control" name="second_title">
          </div>

          <div class="form-group">
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website">
          </div>

          <div class="form-group" style="display:none">
              <label for="person">編輯人:</label>
              <input type="text" class="form-control" name="person" value="{{ Auth::user()->name }}" enctype="multipart/form-data">
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context"></textarea>
              <script>
              CKEDITOR.replace( "context" );
              </script>
          </div>   

          <div class="form-group">
              <label for="file">檔案:</label>
              <input type="file" class="form-control" name="file">
          </div>  
        </div>

          <div id="information_english" style="display: none;">

          <div class="form-group">
              <label for="title_english">title:</label>
              <input type="text" class="form-control" name="title_english">
          </div>

          <div class="form-group">
              <label for="second_title_english">second_title:</label>
              <input type="text" class="form-control" name="second_title_english">
          </div>

          <div class="form-group">
              <label for="website_english">website:</label>
              <input type="text" class="form-control" name="website_english">
          </div>

          <div class="form-group" style="display:none;">
              <label for="person">person:</label>
              <input type="text" class="form-control" name="person" value="{{ Auth::user()->name }}">
          </div>

          <div class="form-group">
              <label for="context_english">context:</label>
              <textarea id="context_english"  name="context_english"></textarea>
              <script>
              CKEDITOR.replace( "context_english" );
              </script>
          </div>   

          <div class="form-group">
              <label for="file_english">file:</label>
              <input type="file" class="form-control" name="file_english" >
          </div>  
        </div>

        <button type="submit" class="btn btn-primary">新增公告</button>
      </form>
  </div>

</div>
</div>
@endsection

