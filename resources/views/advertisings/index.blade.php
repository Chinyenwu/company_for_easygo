@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >廣告輪播</h1>    
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>照片</td>
          <td>標題</td>
          <td>功能</td>
          <td></td>
          <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach($advertisings as $advertising)
        <tr>
            <td>{{$advertising->id}}</td>
            <td>{{$advertising->title}}</td>
            <td>
                <a href="{{ route('advertisings.edit',$advertising->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <a href="{{ route('advertisings.show',$advertising->id)}}" class="btn btn-primary">輪播</a>
            </td>
            <td>
                <form action="{{ route('advertisings.destroy', $advertising->id)}}" method="post">
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
  <?php echo $advertisings->links(); ?>
</div>
@endsection