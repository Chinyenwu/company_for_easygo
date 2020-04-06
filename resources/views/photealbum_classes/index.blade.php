@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >網路資源類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('photealbum_classes.create')}}" class="btn btn-primary">新增公告類別</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($photealbum_classes as $photealbum_class)
        <tr>
            <td>{{$photealbum_class->id}}</td>
            <td>{{$photealbum_class->class}}</td>
            <td>
                <a href="{{ route('photealbum_classes.edit',$photealbum_class->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('photealbum_classes.destroy', $photealbum_class->id)}}" method="post">
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
  <?php echo $photealbum_classes->links(); ?>
</div>
@endsection