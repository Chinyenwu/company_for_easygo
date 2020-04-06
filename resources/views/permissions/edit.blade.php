@extends('layouts.member') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >編輯權限</h1>

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
        <form method="post" action="{{ route('permissions.update', $permission->name) }}" >
            @method('PATCH') 
            @csrf
          <div class="form-group">
              <label for="advertising">廣告輪播:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="advertising" >
                  <option value="yes" <?php echo ($permission->advertising == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->advertising == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="imformation">公告:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="imformation" >
                  <option value="yes" <?php echo ($permission->imformation == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->imformation == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="fileroom">檔案室:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="fileroom" >
                  <option value="yes" <?php echo ($permission->fileroom == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->fileroom == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="photealbum">相簿:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="photealbum" >
                  <option value="yes" <?php echo ($permission->photealbum == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->photealbum == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="page">頁面:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="page" >
                  <option value="yes" <?php echo ($permission->page == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->page == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="networklink">網路資源:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="networklink" >
                  <option value="yes" <?php echo ($permission->networklink == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->networklink == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="auth">使用者列表:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="auth" >
                  <option value="yes" <?php echo ($permission->auth == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->auth == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="register">新增使用者:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="register" >
                  <option value="yes" <?php echo ($permission->register == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->register == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="positions">職稱調整:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="positions" >
                  <option value="yes" <?php echo ($permission->positions == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->positions == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="permission">權限調整:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="permission" >
                  <option value="yes" <?php echo ($permission->permission == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->permission == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="setup">基本資訊:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="setup" >
                  <option value="yes" <?php echo ($permission->setup == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->setup == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="menus">網站架構:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="menus" >
                  <option value="yes" <?php echo ($permission->menus == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->menus == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="website_information">網站資訊:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="website_information" >
                  <option value="yes" <?php echo ($permission->website_information == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->website_information == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="keyword">關鍵字:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="keyword" >
                  <option value="yes" <?php echo ($permission->keyword == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->keyword == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <div class="form-group">
              <label for="setupchange">偏好設定:</label>
              <!--<input type="text" class="form-control" name="class"/>-->
              <select class="form-control" name="setupchange" >
                  <option value="yes" <?php echo ($permission->setupchange == 'yes' ? 'selected="selected"': ''); ?> >yes</option>
                  <option value="no" <?php echo ($permission->setupchange == 'no' ? 'selected="selected"': ''); ?> >no</option>
              </select>    
          </div>
          <button type="submit" class="btn btn-primary">更改</button>
        </form>          
    </div>
</div>
@endsection


