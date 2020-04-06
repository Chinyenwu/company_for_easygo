@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >編輯公告</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('imformations.update', $imformation->id) }}" enctype="multipart/form-data">
          <button type="button" class="btn btn-primary" style="display:inline;" id="basic">基本</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="status">狀態</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="tags">標籤</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="image">圖片</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="email_reminder">寄送提醒</button>
            @method('PATCH') 
            @csrf
          <div id="information_basic">
              <div class="form-group">
              <label for="class">類別:</label>
              <?php $imformation_classes = DB::table('imformation_classes')->get();?>
              <select class="form-control" name="class" >
                  <!--<option value={{ $imformation->class }} selected='selected'>{{ $imformation->class }}</option>-->
                  @foreach($imformation_classes as $imformation_class)
                  <option value="{{$imformation_class->class}}" <?php echo ($imformation->class == $imformation_class->class ? 'selected="selected"': ''); ?>>{{$imformation_class->class}}</option>
                  @endforeach
              </select> 
          </div>

          <div class="form-group">    
              <label for="start_date">開始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $imformation->start_date }} >
          </div>

          <div class="form-group">
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{ $imformation->end_date}} >
          </div>


          </div>

          <div id="information_status" style="display:none">
              <?php $array = explode(",",$imformation->status)?>
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="top" <?php echo (in_array("top", $array) == true ? 'checked="checked"': ''); ?> >置頂
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="hot" <?php echo (in_array("hot", $array) == true ? 'checked="checked"': ''); ?> >熱門
              <input type="checkbox" name="status[]" style="display:inline-flex;" value="disable" <?php echo (in_array("disable", $array) == true ? 'checked="checked"': ''); ?> >隱藏
          </div>
          <?php $array2 = explode(",",$imformation->tag)?>
          <div id="information_tags"  style="display:none">
              <?php $imformation_tags = DB::table('imformation_tags')->get();?>
              @foreach($imformation_tags as $imformation_tag)
                <input type="checkbox" name="tag[]" style="display:inline-flex;" value="{{$imformation_tag->tag}}" <?php echo (in_array($imformation_tag->tag , $array2) == true ? 'checked="checked"': ''); ?> >{{$imformation_tag->tag}}
              @endforeach
          </div>
          <div id="information_image" style="display:none">
              <label for="Image_file">封面圖:</label>
              <input type="file" class="form-control" name="Image_file" >
              <label for="Image_description_chin">圖片描述(中文):</label>
              <input type="text" class="form-control" name="title" value={{ $imformation->Image_description_chin }} >
              <label for="Image_description_eng">圖片描述(英文):</label>
              <input type="text" class="form-control" name="title" value={{ $imformation->Image_description_eng }} >
          </div>
          <div id="information_email_reminder" style="display:none">

          </div>

          <button type="button" class="btn btn-primary" style="display:inline;" id="chinese">中文</button>
          <button type="button" class="btn btn-primary" style="display:inline;" id="english">English</button>

          <div id="information_chinese">
          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $imformation->title }} >
          </div>

          <div class="form-group">
              <label for="second_title">副標題:</label>
              <input type="text" class="form-control" name="second_title" value={{ $imformation->second_title }} >
          </div>

          <div class="form-group">
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $imformation->website }} >
          </div>

          <div class="form-group" style="display:none">
              <label for="person" >編輯人:</label>
              <input type="text" class="form-control" name="person" value={{ Auth::user()->name }} >
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context" >{{ $imformation->context }}</textarea>
              <script>
                CKEDITOR.replace('context', {
                filebrowserUploadUrl: 'ckeditor_4.13.1_full/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
                });
              </script>
          </div>    

          <div class="form-group">
              <label for="file">檔案:</label>
              <input type="file" class="form-control" name="file" value={{ $imformation->file }} >
          </div> 
        </div>

          <div id="information_english" style="display:none">
          <div class="form-group">
              <label for="title_english">title:</label>
              <input type="text" class="form-control" name="title_english" value={{ $imformation->title_english }} >
          </div>

          <div class="form-group">
              <label for="second_title_english">second_title:</label>
              <input type="text" class="form-control" name="second_title_english" value={{ $imformation->second_title_english }} >
          </div>

          <div class="form-group">
              <label for="website_english">website:</label>
              <input type="text" class="form-control" name="website_english" value={{ $imformation->website_english }} >
          </div>

          <div class="form-group" style="display:none">
              <label for="person" >person:</label>
              <input type="text" class="form-control" name="person" value={{ Auth::user()->name }} >
          </div>

          <div class="form-group">
              <label for="context_english">context:</label>
              <textarea id="context_english"  name="context_english" >{{ $imformation->context_english }}</textarea>
              <script>
                CKEDITOR.replace('context_english', {
                filebrowserUploadUrl: 'ckeditor_4.13.1_full/ckeditor/ck_upload.php',
                filebrowserUploadMethod: 'form'
                });
              </script>
          </div>    

          <div class="form-group">
              <label for="file_english">file:</label>
              <input type="file" class="form-control" name="file_english" value={{ $imformation->file_english }} >
              
          </div> 
        </div>

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


