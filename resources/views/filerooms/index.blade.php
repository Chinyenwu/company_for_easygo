@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >檔案室</h1>    
  <div>
  <form action="/filerooms/index/search" method="GET"><!--搜尋-->
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="搜尋公告"> 
        <span class="input-group-btn">
         <button type="submit" class="btn btn-primary">蒐尋公告</button>
        </span>
    </div>
  </form>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>類別</td>
          <td>標題</td>
          <td>最後修改人</td>
          <td>修改日期</td>
        </tr>
    </thead>
    <tbody>
        @foreach($filerooms as $fileroom)
        <tr>
            <td>{{$fileroom->id}}</td>
            <td>{{$fileroom->class}}</td>
            <td>{{$fileroom->title}}</td>
            <td>{{$fileroom->editer}}</td>
            <td>{{$fileroom->edit_time}}</td>
            <td>
                <a href="{{ route('filerooms.edit',$fileroom->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('filerooms.destroy', $fileroom->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
            <td>
                <a href="{{ route('filerooms.show',$fileroom->id)}}" class="btn btn-primary">下載</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div>
  <?php echo $filerooms->links(); ?>
</div>
@endsection