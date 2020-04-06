@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >計畫</h1> 
    <div>
    <form action="{{ route('projects.create')}}" method="GET">
          <div class="input-group">  
              <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
              <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">新增計畫</button>
              </span>
          </div>
    </form>
    <!--<a style="margin: 19px;" href="{{ route('projects.create')}}" class="btn btn-primary">新增計畫</a>-->
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
        @foreach($projects as $project)
        <tr>
            <td>{{$project->id}}</td>
            <td>{{$project->project_name}}</td>
            <td>
                <a href="{{ route('projects.edit',$project->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('projects.destroy', $project->id)}}" method="post">
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
<?php echo $projects->links(); ?>
</div>
@endsection