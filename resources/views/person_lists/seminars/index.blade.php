@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >研討會</h1> 
    <div>
    <form action="{{ route('seminars.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增研討會</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('seminars.create')}}" class="btn btn-primary">新增研討會</a>-->
    </div>   
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>標題</td>
        </tr>
    </thead>
    <tbody>
        @foreach($seminars as $seminar)
        <tr>
            <td>{{$seminar->id}}</td>
            <td>{{$seminar->speech_name}}</td>
            <td>
                <a href="{{ route('seminars.edit',$seminar->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('seminars.destroy', $seminar->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div>
<?php echo $seminars->links(); ?>
</div>
@endsection