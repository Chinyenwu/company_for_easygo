@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >頁面類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('page_classes.create')}}" class="btn btn-primary">新增頁面類別</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($page_classes as $page_class)
        <tr>
            <td>{{$page_class->id}}</td>
            <td>{{$page_class->class}}</td>
            <td>
                <a href="{{ route('page_classes.edit',$page_class->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('page_classes.destroy', $page_class->id)}}" method="post">
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
  <?php echo $page_classes->links(); ?>
</div>
@endsection

