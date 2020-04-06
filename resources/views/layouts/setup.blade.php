<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/adapters/jquery.js"></script>
    <!--<script src="{{ asset('ckeditor_4.13.1_full/ckeditor/ckeditor.js') }}" ></script>
    <script src="{{ asset('ckeditor_4.13.1_full/ckeditor/adapters/jquery.js') }}" ></script>-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <?php $permission = DB::table('permissions')->where('name', Auth::user()->name)->first()?>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    {{ config('首頁', '首頁') }}
                </a>
                        <!-- Authentication Links -->
                        <a class="nav-link" href="{{ url('/home') }}" >{{ __('網站功能') }}</a>
                        <a class="nav-link" href="{{ url('/member') }}" >{{ __('會員系統') }}</a>
                        <a class="nav-link" href="{{ url('/setup') }}" >{{ __('網站設定') }}</a>
                        @guest
                            <oi class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a>
                            </oi>
                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新增成員') }}</a>
                                </li>
                            @endif-->
                        @else
                            <oi class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('登出') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </oi>
                        @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="btn btn-light" href="{{ url('/setup') }}" >系統資訊</a></li>
                        @if($permission->menus=="yes")
                        <li><a class="btn btn-light" href="{{ route('menus.index') }}" >網站架構</a></li>
                        @endif
                        @if($permission->website_information=="yes")
                        <li><a class="btn btn-light" href="{{ route('website_informations.create') }}" >
                        網站資訊</a></li>
                        @endif
                        @if($permission->keyword=="yes")
                        <li><a class="btn btn-light" href="{{ route('keywords.create')}}" >關鍵字設定</a></li>
                        @endif
                        @if($permission->setupchange=="yes")
                        <li><a class="btn btn-light" href="{{ route('setupchanges.create') }}" >配置修改</a></li>
                        @endif
                    </ul>

                </div>
            </div>
        </nav>
         <!--<div style="float:left;">
            <ul class="nav nav-tabs">
                <li><a class="btn btn-light" href="{{ url('/setup') }}" >系統資訊</a></li>
            </ul>   
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ url('/setup/tasks') }}" >網站架構</a></li>
            </ul>
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ route('website_informations.create') }}" >網站資訊</a></li>
            </ul> 
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ route('keywords.create')}}" >關鍵字設定</a></li>
            </ul> 
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ url('/setup/prefers') }}" >系統偏好</a></li>
            </ul> 
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ route('setupchanges.create') }}" >配置修改</a></li>
            </ul>                          
        </div>-->   
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
