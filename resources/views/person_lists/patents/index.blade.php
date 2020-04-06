@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >專利</h1>  
    <div>
    <form action="{{ route('patents.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增專利</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('patents.create')}}" class="btn btn-primary">新增專利</a>-->
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
        @foreach($patents as $patent)
        <tr>
            <td>{{$patent->id}}</td>
            <td>{{$patent->name}}</td>
            <td>
                <a href="{{ route('patents.edit',$patent->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('patents.destroy', $patent->id)}}" method="post">
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
<?php echo $patents->links(); ?>
</div>
@endsection