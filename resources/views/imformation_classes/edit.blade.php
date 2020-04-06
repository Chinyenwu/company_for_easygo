@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >更改公告類別</h1>

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
        <form method="post" action="{{ route('imformation_classes.update', $imformation_class->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="class">中文:</label>
                <input type="text" class="form-control" name="class" value={{ $imformation_class->class }} >
                <label for="class">Eeglish:</label>
                <input type="text" class="form-control" name="class_english" value={{ $imformation_class->class_english }} >
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</div>
@endsection