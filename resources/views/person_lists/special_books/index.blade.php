@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >專書</h1>  
    <div>
    <form action="{{ route('special_books.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增專書</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('special_books.create')}}" class="btn btn-primary">新增專書</a>-->
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
        @foreach($special_books as $special_book)
        <tr>
            <td>{{$special_book->id}}</td>
            <td>{{$special_book->name}}</td>
            <td>
                <a href="{{ route('special_books.edit',$special_book->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('special_books.destroy', $special_book->id)}}" method="post">
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
<?php echo $special_books->links(); ?>
</div>
@endsection