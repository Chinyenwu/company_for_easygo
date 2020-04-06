@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >編輯網路資源</h1>

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
        <form method="post" action="{{ route('networklinks.update', $networklink->id) }}">
            @method('PATCH') 
            @csrf

          <div class="form-group">
              <label for="class">類別:</label>
              <?php $networklink_classes = DB::table('networklink_classes')->get();?>
              <select class="form-control" name="class" >
                  @foreach($networklink_classes as $networklink_class)
                  <option value="{{$networklink_class->class}}" <?php echo ($networklink->class == $networklink_class->class ? 'selected="selected"': ''); ?>>{{$networklink_class->class}}</option>
                  @endforeach
              </select> 
          </div>

          <div class="form-group">    
              <label for="title">標題:</label>
              <input type="text" class="form-control" name="title" value={{ $networklink->title}}>
          </div>

          <div class="form-group">
              <label for="content">內容:</label>
              <input type="text" class="form-control" name="content" value={{ $networklink->content}}>
          </div>

          <div class="form-group">
              <label for="link">網址:</label>
              <input type="text" class="form-control" name="link" value={{ $networklink->link}}>
          </div>

          <div class="form-group">
              <label for="way">開啟方式:</label>
              <input type="text" class="form-control" name="way" value={{ $networklink->way}}>
          </div>

          <div class="form-group" style="display:none">
              <label for="editer">編輯人:</label>
              <input type="text" class="form-control" name="editer" value="{{ Auth::user()->name }}">
          </div>    
 

            <button type="submit" class="btn btn-primary">更新</button>

        </form>
    </div>

</div>
@endsection


