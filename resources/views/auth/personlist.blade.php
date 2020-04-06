@extends('layouts.member') 
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <h1>這是個人教師外掛</h1>
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
          <form action="/person_lists/activities" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">活動</button>
                    </span>
                </div>
          </form> 

          <form action="/person_lists/educations" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">學歷</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/experiences" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">經驗</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/honors" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">榮譽</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/journals" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">期刊</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/patents" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">專利</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/projects" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">專案</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/reserches" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">研究</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/seminars" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">研討會</button>
                    </span>
                </div>
          </form>

          <form action="/person_lists/special_books" method="GET">
                <div class="input-group">  
                    <input type="text" class="form-control" name="id" value={{ $user->id }}  style="display: none;"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">專書</button>
                    </span>
                </div>
          </form>
       
        </div>
    </div>
</div>

@endsection

<!-- style="display:none" -->