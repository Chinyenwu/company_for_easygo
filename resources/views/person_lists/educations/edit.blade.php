
@extends('layouts.member') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >學歷編輯</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
          <form method="post" action="{{ route('educations.update', $education->id) }}">
          @method('PATCH') 
          @csrf
          <div class="form-group">    
              <label for="name">校名:</label>
              <input type="text" class="form-control" name="name" value={{ $education->name}} >
          </div>
          <div class="form-group">    
              <label for="country">國家:</label>
              <input type="text" class="form-control" name="country" value={{ $education->country}}>
          </div>
          <div class="form-group">    
              <label for="department">科系:</label>
              <input type="text" class="form-control" name="department" value={{ $education->department}}>
          </div>
          <div class="form-group">    
              <label for="degree">學位:</label>
              <input type="text" class="form-control" name="degree" value={{ $education->degree}}>
          </div>
          <div class="form-group">    
              <label for="start_date">起始日期:</label>
              <input type="date" class="form-control" name="start_date" value={{ $education->start_date}}>
          </div>
          <div class="form-group">    
              <label for="end_date">結束日期:</label>
              <input type="date" class="form-control" name="end_date" value={{ $education->end_date}}>
          </div>  
          <div class="form-group">    
              <label for="website">網站:</label>
              <input type="text" class="form-control" name="website" value={{ $education->website}}>
          </div>
          <div class="form-group">    
              <label for="remark">備註:</label>
              <textarea class="form-control" name="remark" >{{ $education->remark}}</textarea>
          </div> 
                     
          <button type="submit" class="btn btn-primary">新增</button>
      </form>
    </div>
</div>
@endsection
