@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >研究</h1>    
    <div>
    <form action="{{ route('reserches.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增研究</button>
              </span>
          </div>
    </form>      
    <!--<a style="margin: 19px;" href="{{ route('reserches.create')}}" class="btn btn-primary">新增研究</a>-->
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
        @foreach($reserches as $reserch)
        <tr>
            <td>{{$reserch->id}}</td>
            <td>{{$reserch->name}}</td>
            <td>
                <a href="{{ route('reserches.edit',$reserch->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('reserches.destroy', $reserch->id)}}" method="post">
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
<?php echo $reserches->links(); ?>
</div>
@endsection