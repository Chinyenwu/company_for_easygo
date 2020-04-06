@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >期刊</h1>  
    <div>
    <form action="{{ route('journals.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增期刊</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('journals.create')}}" class="btn btn-primary">新增期刊</a>-->
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
        @foreach($journals as $journal)
        <tr>
            <td>{{$journal->id}}</td>
            <td>{{$journal->speech_name}}</td>
            <td>
                <a href="{{ route('journals.edit',$journal->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('journals.destroy', $journal->id)}}" method="post">
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
<?php echo $journals->links(); ?>
</div>
@endsection