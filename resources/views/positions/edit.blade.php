@extends('layouts.member') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 >更改職務</h1>

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
        <form method="post" action="{{ route('positions.update', $position->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="class">類別:</label>
                <input id="class" type="radio"  name="class" value="{{ '教師' }}" >教師
                <input id="class" type="radio"  name="class" value="{{ '行政人員' }}" >行政人員
            </div>
            <div class="form-group">
                <label for="position">類別:</label>
                <input type="text" class="form-control" name="position" value={{ $position->position }} />
            </div>

            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>
</div>
@endsection