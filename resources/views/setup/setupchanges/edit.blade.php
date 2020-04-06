@extends('layouts.setup')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1>配置修改</h1>
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
        <form method="post" action="{{ route('setupchanges.store') }}">
            @method('post') 
            @csrf
          <div class="form-group">
              <label for="encryption">網站網址加密(*請勿任意修改)</label>
              <input type="text" class="form-control" name="encryption" value={{ $setupchange->encryption }} >
          </div>  

          <div class="form-group">
              <label for="logouttime">自動登出時間</label>
              <input type="text" class="form-control" name="logouttime" value={{ $setupchange->logouttime }} >
          </div>

          <div class="form-group">
              <label for="loginfail">登入失敗次數</label>
              <input type="text" class="form-control" name="loginfail" value={{ $setupchange->loginfail }} >
          </div>

          <div class="form-group">
              <label for="uploadtype">檔案上傳類型限制</label>
              <input type="text" class="form-control" name="uploadtype" value={{ $setupchange->uploadtype }} >
          </div>

          <div class="form-group">
              <label for="uploadsize">檔案上傳大小限制</label>
              <input type="text" class="form-control" name="uploadsize" value={{ $setupchange->uploadsize }} >
          </div>

          <div class="form-group">
              <label for="picturetype">圖片類型限制</label>
              <input type="text" class="form-control" name="picturetype" value={{ $setupchange->picturetype }} >
          </div>

          <div class="form-group">
              <label for="picturesize">圖片大小限制</label>
              <input type="text" class="form-control" name="picturesize" value={{ $setupchange->picturesize }} >
          </div>

          <div class="form-group">
              <label for="headpastesize">大頭貼大小限制</label>
              <input type="text" class="form-control" name="headpastesize" value={{ $setupchange->headpastesize }} >
          </div>

          <div class="form-group">
              <label for="headpastewidth">大頭貼寬度</label>
              <input type="text" class="form-control" name="headpastewidth" value={{ $setupchange->headpastewidth }} >
          </div>

          <div class="form-group">
              <label for="headpasteheight">大頭貼高度</label>
              <input type="text" class="form-control" name="headpasteheight" value={{ $setupchange->headpasteheight }} >
          </div>

          <div class="form-group">
              <label for="photeuploadnumber">相簿單次上傳張數限制</label>
              <input type="text" class="form-control" name="photeuploadnumber" value={{ $setupchange->photeuploadnumber }} >
          </div>

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
        </div>
    </div>
</div>
@endsection