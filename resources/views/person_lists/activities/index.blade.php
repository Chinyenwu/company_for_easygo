@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >活動</h1>  
    <div>
    <form action="{{ route('activities.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增活動</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('activities.create')}}" class="btn btn-primary">新增活動</a>
    </div>-->  
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>標題</td>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->name}}</td>
            <td>
                <a href="{{ route('activities.edit',$activity->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('activities.destroy', $activity->id)}}" method="post">
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
<?php echo $activities->links(); ?>
</div>
@endsection