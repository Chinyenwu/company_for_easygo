@extends('layouts.member')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('新增成員') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('帳號') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                               
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('密碼') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認密碼') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('姓氏') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" >

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('名字') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" >

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('信箱') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="staff_number" class="col-md-4 col-form-label text-md-right">{{ __('員工編號') }}</label>

                            <div class="col-md-6">
                                <input id="staff_number" type="text" class="form-control @error('staff_number') is-invalid @enderror" name="staff_number" value="{{ old('staff_number') }}" >

                                @error('staff_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="contact_phone" class="col-md-4 col-form-label text-md-right">{{ __('辦公室電話') }}</label>

                            <div class="col-md-6">
                                <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone') }}" >

                                @error('contact_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="fax" class="col-md-4 col-form-label text-md-right">{{ __('傳真') }}</label>

                            <div class="col-md-6">
                                <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ old('fax') }}" >

                                @error('fax')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="cell_phone" class="col-md-4 col-form-label text-md-right">{{ __('手機') }}</label>

                            <div class="col-md-6">
                                <input id="cell_phone" type="text" class="form-control @error('cell_phone') is-invalid @enderror" name="cell_phone" value="{{ old('cell_phone') }}" >

                                @error('cell_phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('性別') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio"  name="gender" value="{{ '男性' }}" >男性
                                <input id="gender" type="radio"  name="gender" value="{{ '女性' }}" >女性

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('生日') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('cell_phone') is-invalid @enderror" name="birthday" value = "{{date('Y-m-d')}}">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="contact_address" class="col-md-4 col-form-label text-md-right">{{ __('連絡地址') }}</label>

                            <div class="col-md-6">
                                <input id="contact_address" type="text" class="form-control @error('cell_phone') is-invalid @enderror" name="contact_address" value="{{ old('contact_address') }}" >

                                @error('contact_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="permission" class="col-md-4 col-form-label text-md-right">{{ __('權限') }}</label>
                            <div class="col-md-6" id="register_position1" >
                            <select class="form-control" name="permission" >
                                    <option value="manager">一般使用者</option>
                                    <option value="super_manager">管理者</option>
                            </select>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('職務類別') }}</label>

                            <div class="col-md-6">

                                <input id="class" type="radio"  name="class" class="register_teacher" value="{{ '教師' }}" >教師
                                <input id="class" type="radio"  name="class" class="register_staff" value="{{ '行政人員' }}" >行政人員
                                @error('class')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('職務名稱') }}</label>
                            <div class="col-md-6" id="register_position1" >
                            <?php $positions = DB::table('positions')->where('class','=','教師')->get();?>
                            <select class="form-control" name="position" >
                                @foreach($positions as $position)
                                    <option value="{{$position->position}}">{{$position->position}}</option>
                                @endforeach
                            </select> 
                            </div>
                            <div class="register_position1" style="display:none">
                            </div>
                           <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('職務名稱') }}</label>
                           <div class="col-md-6" id="register_position2" >
                            <?php $positions2 = DB::table('positions')->where('class','=','行政人員')->get();?>
                            <select class="form-control" name="position" >
                                @foreach($positions2 as $position2)
                                    <option value="{{$position2->position}}">{{$position2->position}}</option>
                                @endforeach
                            </select> 
                            
                            </div>
                            <div class="register_position2" style="display:none">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('新增') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
@endsection
