@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >公告類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('imformation_classes.create')}}" class="btn btn-primary">新增公告類別</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($imformation_classes as $imformation_class)
        <tr>
            <td>{{$imformation_class->id}}</td>
            <td>{{$imformation_class->class}}</td>
            <td>
                <a href="{{ route('imformation_classes.edit',$imformation_class->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('imformation_classes.destroy', $imformation_class->id)}}" method="post">
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
  <?php echo $imformation_classes->links(); ?>
</div>
@endsection