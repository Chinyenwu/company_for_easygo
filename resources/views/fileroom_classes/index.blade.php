@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >檔案室類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('fileroom_classes.create')}}" class="btn btn-primary">新增檔案室類別</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($fileroom_classes as $fileroom_class)
        <tr>
            <td>{{$fileroom_class->id}}</td>
            <td>{{$fileroom_class->class}}</td>
            <td>
                <a href="{{ route('fileroom_classes.edit',$fileroom_class->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('fileroom_classes.destroy', $fileroom_class->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
  <?php echo $fileroom_classes->links(); ?>
</div>
@endsection

