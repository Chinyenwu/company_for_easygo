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
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <!--<script src="{{ asset('ckeditor_4.13.1_full/ckeditor/ckeditor.js') }}" ></script>
    <script src="{{ asset('ckeditor_4.13.1_full/ckeditor/adapters/jquery.js') }}" ></script>-->
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script src="//cdn.ckeditor.com/4.13.1/full/adapters/jquery.js"></script>
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
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a>
                            </li>
                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新增成員') }}</a>
                                </li>
                            @endif-->
                            
                        @else
                            <a class="nav-link" href="{{ url('/home') }}" >{{ __('網站功能') }}</a>
                            <a class="nav-link" href="{{ url('/member') }}" >{{ __('會員系統') }}</a>
                            <a class="nav-link" href="{{ url('/setup') }}" >{{ __('網站設定') }}</a>
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                @if($permission->advertising=="yes")
               <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>廣告輪播</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/advertisings') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/advertisings/create') }}" >新增</a></li>
                </ul>
                </li>
                @endif
                @if($permission->imformation=="yes")
               <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>公告</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/imformations') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/imformations/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/imformation_classes') }}" >類別</a></li>
                    <li><a class="btn btn-light" href="{{ url('/imformation_tags') }}" >標籤</a></li>
                </ul>
                </li>
                @endif
                @if($permission->fileroom=="yes")
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>檔案室</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/filerooms') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/filerooms/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/fileroom_classes') }}" >類別</a></li>
                </ul>
                </li>
                @endif
                @if($permission->photealbum=="yes") 
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>相簿</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/photealbums') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/photealbums/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/photealbum_classes') }}" >類別</a></li>
                </ul>
                </li>
                @endif
                @if($permission->page=="yes") 
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>頁面</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/pages') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/pages/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/page_classes') }}" >類別</a></li>
                </ul>
                </li>
                @endif
                @if($permission->networklink=="yes")
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>相關連結</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/networklinks') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/networklinks/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/networklink_classes') }}" >類別</a></li>
                </ul>
                </li>
                @endif                              
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!--<div style="float:left;">
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">廣告輪播</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/advertisings') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/advertisings/create') }}" >新增</a></li>
                </ul>
                </li>
            </ul> 
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">公告</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/imformations') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/imformations/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/imformation_classes') }}" >類別</a></li>
                </ul>
                </li>
            </ul>    
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">檔案室</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/filerooms') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/filerooms/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/fileroom_classes') }}" >類別</a></li>
                </ul>
                </li>
            </ul> 
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">相簿</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/photealbums') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/photealbums/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/photealbum_classes') }}" >類別</a></li>
                </ul>
                </li>
            </ul> 
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">頁面</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/pages') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/pages/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/page_classes') }}" >類別</a></li>
                </ul>
                </li>
            </ul> 
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">相關連結</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/networklinks') }}" >列表</a></li>
                    <li><a class="btn btn-light" href="{{ url('/networklinks/create') }}" >新增</a></li>
                    <li><a class="btn btn-light" href="{{ url('/networklink_classes') }}" >類別</a></li>
                </ul>
                </li>
            </ul>       
        </div>-->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
