@extends('layouts.member') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >編輯成員</h1>

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
        <form method="post" action="{{ route('auth.update', $user->id) }}">
            @method('PATCH') 
            @csrf
          <div class="form-group">
              <label for="first_name">姓:</label>
              <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} >
          </div>

          <div class="form-group">
              <label for="last_name">名:</label>
              <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} >
          </div>

          <div class="form-group">
              <label for="email">信箱:</label>
              <input type="text" class="form-control" name="email" value={{ $user->email }} >
          </div>

          <div class="form-group">
              <label for="staff_number">員編標號:</label>
              <input type="text" class="form-control" name="staff_number" value={{ $user->staff_number }} >
          </div>

          <div class="form-group">
              <label for="contact_phone">連絡電話:</label>
              <input type="text" class="form-control" name="contact_phone" value={{ $user->contact_phone }} >
          </div>

          <div class="form-group">
              <label for="contact_phone">連絡電話:</label>
              <input type="text" class="form-control" name="contact_phone" value={{ $user->contact_phone }} >
          </div>

          <div class="form-group">
              <label for="fax">傳真:</label>
              <input type="text" class="form-control" name="fax" value={{ $user->fax }} >
          </div>

          <div class="form-group">
              <label for="cell_phone">手機:</label>
              <input type="text" class="form-control" name="cell_phone" value={{ $user->cell_phone }} >
          </div>

          <div class="form-group">
              <label for="gender">性別:</label>
              <input type="text" class="form-control" name="gender" value={{ $user->gender }} >
          </div>

          <div class="form-group">
              <label for="birthday">生日:</label>
              <input type="date" class="form-control" name="birthday" value={{ $user->birthday}} >
          </div>  
 
          <div class="form-group">
              <label for="contact_address">住址:</label>
              <input type="text" class="form-control" name="contact_address" value={{ $user->contact_address }} />
          </div>

          <div class="form-group">
              <label for="permission">權限:</label>
              <select class="form-control" name="permission" >
              <option value="super_manager" <?php echo ($user->permission == 'super_manager' ? 'selected="selected"': ''); ?>>管理者</option>
              <option value="manager" <?php echo ($user->permission == 'manager' ? 'selected="selected"': ''); ?>>一般使用者</option>
            </select>
          </div>          

          <div class="form-group">
              <label for="class">職務類別:</label>
              <input id="class" type="radio"  name="class" class="register_teacher" value="{{ '教師' }}" <?php echo ($user->class == "教師" ? 'checked="checked"': ''); ?> >教師
              <input id="class" type="radio"  name="class" class="register_staff" value="{{ '行政人員' }}" 
              <?php echo ($user->class == "行政人員" ? 'checked="checked"': ''); ?> >行政人員
          </div>

          <div class="form-group">
              <label for="position">職稱:</label>
              <div class="register_position1" style="display:none">
              <?php $positions = DB::table('positions')->where('class','=','教師')->get();?>
              <select class="form-control" name="position"  >
                  @foreach($positions as $position)
                      <option value="{{$position->position}}" <?php echo ($user->position == $position->position ? 'selected="selected"': ''); ?> >{{$position->position}}</option>
                  @endforeach
              </select> 
              </div>
              <div class="register_position2" style="display:none">
              <?php $positions2 = DB::table('positions')->where('class','=','行政人員')->get();?>
              <select class="form-control" name="position"  >
                  @foreach($positions2 as $position2)
                     <option value="{{$position2->position}}" <?php echo ($user->position == $position2->position ? 'selected="selected"': ''); ?> >{{$position2->position}}</option>
                  @endforeach
              </select> 
            </div>
          </div> 

            <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
</div>
@endsection


