@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >相簿</h1>

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
        <form method="post" action="{{ route('photealbums.update', $photealbum->id) }}">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="class">類別:</label>
              <?php $photealbum_classes = DB::table('photealbum_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($photealbum_classes as $photealbum_class)
                  <option value="{{$photealbum_class->class}}" <?php echo ($photealbum->class == $photealbum_class->class ? 'selected="selected"': ''); ?>>{{$photealbum_class->class}}</option>
                  @endforeach
              </select> 
          </div>

          <div class="form-group">
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $photealbum->title }} >
          </div>

          <div class="form-group">
              <label for="context">內文:</label>
              <textarea id="context"  name="context" >{{ $photealbum->context }}</textarea>
          </div>    
                               
          <script>
            CKEDITOR.replace( "context" );
          </script>   

          <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>
</div>
@endsection


