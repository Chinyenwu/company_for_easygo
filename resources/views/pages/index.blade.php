@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >頁面</h1>
  <form action="/pages/index/search" method="GET"><!--搜尋-->
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="搜尋公告"> 
        <span class="input-group-btn">
         <button type="submit" class="btn btn-primary">蒐尋公告</button>
        </span>
    </div>
  </form>    
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>類別</td>
          <td>標題</td>
          <td>最後修改人</td>
          <td>最後修改時間</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pages as $page)
        <tr>
            <td>{{$page->id}}</td>
            <td>{{$page->class}}</td>
            <td>{{$page->title}}</td>
            <td>{{$page->editer}}</td>
            <td>{{$page->updated_at}}</td>
            <td>
                <a href="{{ route('pages.edit',$page->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('pages.destroy', $page->id)}}" method="post">
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
  <?php echo $pages->links(); ?>
</div>
@endsection