@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >網路資源類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('networklink_classes.create')}}" class="btn btn-primary">新增公告類別</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($networklink_classes as $networklink_class)
        <tr>
            <td>{{$networklink_class->id}}</td>
            <td>{{$networklink_class->class}}</td>
            <td>
                <a href="{{ route('networklink_classes.edit',$networklink_class->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('networklink_classes.destroy', $networklink_class->id)}}" method="post">
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
  <?php echo $networklink_classes->links(); ?>
</div>
@endsection