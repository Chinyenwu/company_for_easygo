@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
  <h1 >輪播</h1>    
  <a href="{{ route('adphotes.edit',$advertising->id)}}" class="btn btn-primary">新增</a>
  <div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>id</td>
          <td>屬於</td>
          <td>名子</td>
          <td>功能</td>
        </tr>
    </thead>
    <tbody>
        @foreach($adphotes as $adphote)
        <tr>
            <td>{{$adphote->id}}</td>
            <td>{{$adphote->belong}}</td>
            <td>{{$adphote->name}}</td>
            <td>
                <form action="{{ route('adphotes.destroy', $adphote->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
            <td><img src="{{ url('storage/adphote/'.$adphote->belong.'/'.$adphote->name) }}" alt="{{$adphote->name}}" title="{{$adphote->name}}" width="15%"></td>
            <td> 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div>
  <?php echo $adphotes->links(); ?>
</div>
@endsection