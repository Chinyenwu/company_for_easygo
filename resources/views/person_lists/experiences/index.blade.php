@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >經歷</h1>   
    <div>
    <form action="{{ route('experiences.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增活動</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('experiences.create')}}" class="btn btn-primary">新增經歷</a>-->
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
        @foreach($experiences as $experience)
        <tr>
            <td>{{$experience->id}}</td>
            <td>{{$experience->angency_name}}</td>
            <td>
                <a href="{{ route('experiences.edit',$experience->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('experiences.destroy', $experience->id)}}" method="post">
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
<?php echo $experiences->links(); ?>
</div>
@endsection