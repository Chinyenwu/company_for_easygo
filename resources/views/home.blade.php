@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>這裡是後台功能管理</h1>
        </div>
    </div>
</div>
@endsection


            <!--<div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>--> 

    <!--<nav class="nav navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">//底下放要縮放的內容
                <ul class="nav navbar-nav">
                    <li><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#menu1">Page 1</a></li>
                    <li><a data-toggle="tab" href="#menu2">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li>
                    <li><a href="#">Log out</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>-->