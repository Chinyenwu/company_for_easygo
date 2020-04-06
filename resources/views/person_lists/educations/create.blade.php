@extends('layouts.member')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 >新增學歷</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('educations.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">校名:</label>
              <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">    
              <label for="country">國家:</label>
              <input type="text" class="form-control" name="country">
          </div>
          <div class="form-group">    
              <label for="department">科系:</label>
              <input type="text" class="form-control" name="department">
          </div>
          <div class="form-group">    
              <label for="degree">學位:</label>
              <input type="text" class="form-control" name="degree">
          </div>
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value = "{{date('Y-m-d')}}">
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value = "{{date('Y-m-d', strtotime('+1 year'))}}">
          </div>  
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website">
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea  class="form-control" name="remark"></textarea>
          </div> 
          <div class="form-group" style="display: none;">    
              <label for="person">持有人:</label>
              <input type="text" class="form-control" name="person" value={{$user->name}}>
          </div>                      
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
  </div>
</div>
</div>
@endsection