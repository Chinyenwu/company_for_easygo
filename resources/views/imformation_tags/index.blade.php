@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >公告類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('imformation_tags.create')}}" class="btn btn-primary">新增公告標籤</a>
    </div>   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>類別</td>
        </tr>
    </thead>
    <tbody>
        @foreach($imformation_tags as $imformation_tag)
        <tr>
            <td>{{$imformation_tag->id}}</td>
            <td>{{$imformation_tag->tag}}</td>
            <td>
                <a href="{{ route('imformation_tags.edit',$imformation_tag->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('imformation_tags.destroy', $imformation_tag->id)}}" method="post">
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
  <?php echo $imformation_tags->links(); ?>
</div>
@endsection