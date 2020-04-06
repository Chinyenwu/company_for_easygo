@extends('layouts.member')

@section('content')
<div class="row">
<div class="col-sm-12">
    <h1 >職務類別</h1>  
    <div>
    <a style="margin: 19px;" href="{{ route('positions.create')}}" class="btn btn-primary">新增職務</a>
    <form action="/positions/index/search" method="GET"><!--搜尋-->
    <div class="input-group">
        <input id="class" type="radio"  name="search" value="{{ '教師' }}" class="teacher">教師
        <input id="class" type="radio"  name="search" value="{{ '行政人員' }}" class="staff">行政人員 
        <span class="input-group-btn">
         <button type="submit" class="btn btn-primary">蒐尋</button>
        </span>
    </div>
    </form> 
    </div> 
   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>職務類別</td>
          <td>職務名稱</td>
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $position)
        <tr>
            <td>{{$position->id}}</td>
            <td>{{$position->class}}</td>
            <td>{{$position->position}}</td>
            <td>
                <a href="{{ route('positions.edit',$position->id)}}" class="btn btn-primary">編輯</a>
            </td>
            <td>
                <form action="{{ route('positions.destroy', $position->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">刪除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

</div>
@endsection

