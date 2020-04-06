@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >獎項</h1>  
    <div>
    <form action="{{ route('honors.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增獎項</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('honors.create')}}" class="btn btn-primary">新增榮譽</a>-->
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
        @foreach($honors as $honor)
        <tr>
            <td>{{$honor->id}}</td>
            <td>{{$honor->name}}</td>
            <td>
                <a href="{{ route('honors.edit',$honor->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('honors.destroy', $honor->id)}}" method="post">
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
<?php echo $honors->links(); ?>
</div>
@endsection