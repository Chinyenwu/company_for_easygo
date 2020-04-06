@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >相簿</h1>    
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>類別</td>
          <td>標題</td>
          <td>最後修改時間</td>
        </tr>
    </thead>
    <tbody>
        @foreach($photealbums as $photealbum)
        <tr>
            <td>{{$photealbum->id}}</td>
            <td>{{$photealbum->class}}</td>
            <td>{{$photealbum->title}}</td>
            <td>{{$photealbum->updated_at}}</td>
            <td>
                <a href="{{ route('photealbums.edit',$photealbum->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <a href="{{ route('photealbums.show',$photealbum->id)}}" class="btn btn-primary">上傳照片</a>
            </td>
            <td>
                <form action="{{ route('photealbums.destroy', $photealbum->id)}}" method="post">
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
  <?php echo $photealbums->links(); ?>
</div>
@endsection