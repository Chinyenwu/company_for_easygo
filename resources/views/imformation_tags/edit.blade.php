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
        <form method="post" action="{{ route('imformation_tags.update', $imformation_tag->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="tag">類別:</label>
                <input type="text" class="form-control" name="tag" value={{ $imformation_tag->tag }} >
                <label for="tag_english">類別:</label>
                <input type="text" class="form-control" name="tag_english" value={{ $imformation_tag->tag_english }} >
            </div>
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</div>
@endsection