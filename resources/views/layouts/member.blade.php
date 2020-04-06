<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        <a class="nav-link" href="{{ url('/home') }}" >{{ __('網站功能') }}</a>
                        <a class="nav-link" href="{{ url('/member') }}" >{{ __('會員系統') }}</a>
                        <a class="nav-link" href="{{ url('/setup') }}" >{{ __('網站設定') }}</a>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('登入') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新增成員') }}</a>
                                </li>
                            @endif
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
            <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                <li><a class="btn btn-light" href="{{ url('/auth/create') }}" >個人資料</a></li>
                @if($permission->auth=="yes")
                <li><a class="btn btn-light" href="{{ url('/auth') }}" >人員列表</a></li>
                @endif
                <li><a class="btn btn-light" href="{{ url('/auth/show') }}" >密碼重置</a></li>
                @if($permission->register=="yes")
                <li><a class="btn btn-light" href="{{ url('/register') }}" >新增成員</a></li>
                @endif
                @if($permission->positions=="yes") 
                <li><a class="btn btn-light" href="{{ url('/positions') }}" >教師職稱調整</a></li>
                @endif
                @if($permission->permission=="yes")
                <li><a class="btn btn-light" href="{{ url('/permissions') }}" >成員權限調整</a></li>
                @endif
                <!--<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" v-pre>教師外掛</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/person_lists/activities') }}" >活動</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/educations') }}" >學歷</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/experiences') }}" >經驗</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/honors') }}" >榮譽</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/journals') }}" >期刊</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/patents') }}" >專利</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/projects') }}" >專案</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/reserches') }}" >研究</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/seminars') }}" >研討會</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/special_books') }}" >專書</a></li>
                </ul>
                </li>-->                
            </ul>

                </div>
            </div>
        </nav>
         <!--<div style="float:left;">
            <ul class="nav nav-tabs">
                <li><a class="btn btn-light" href="{{ url('/auth/create') }}" >個人資料</a></li>
            </ul>   
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ url('/auth') }}" >人員列表</a></li>
            </ul>   
            <ul class="nav nav-tabs">   
                <li><a class="btn btn-light" href="{{ url('/auth/show') }}" >密碼重置</a></li>
            </ul>  
            <ul class="nav nav-tabs">    
                <li><a class="btn btn-light" href="{{ url('/register') }}" >新增成員</a></li>               
            </ul>  
            <ul class="nav nav-tabs">    
                <li><a class="btn btn-light" href="{{ url('/positions') }}" >教師職稱調整</a></li>               
            </ul>
            <ul class="nav nav-tabs">
                <li class="dropdown"><a class="btn btn-light"class="dropdown-toggle"  data-toggle="dropdown" href="#">教師外掛</a>
                <ul class="dropdown-menu">
                    <li><a class="btn btn-light" href="{{ url('/person_lists/activities') }}" >活動</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/educations') }}" >學歷</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/experiences') }}" >經驗</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/honors') }}" >榮譽</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/journals') }}" >期刊</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/patents') }}" >專利</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/projects') }}" >專案</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/reserches') }}" >研究</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/seminars') }}" >研討會</a></li>
                    <li><a class="btn btn-light" href="{{ url('/person_lists/special_books') }}" >專書</a></li>
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
