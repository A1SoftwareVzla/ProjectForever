<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <style>
    html, body {
                background-color: #fff;
                background-image: url('{{asset('image/SoccerWallpaper.jpg')}}');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                color: #636b6f;
                height: 100vh;
                margin: 0;
            }
    </style>  
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <a href="{{ url('/') }}" class="brand-logo center">
                <img class="responsive-img" src="{{ asset('image/LogoPronostiklo.png')}}">
            </a>
        </div>
    </div>
    <div class="fixed-action-btn">
        <a href="#" data-target="slide-out" class="btn-floating btn-large orange darken-1 sidenav-trigger">
            <i class="large material-icons">menu</i>
        </a>
    </div>
</div>     
      
<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="http://lorempixel.com/400/350/nature">
      </div>
      <!--<a href="#user"><img class="circle" src="http://lorempixel.com/100/100/sports"></a>-->
      <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
      <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <!--<li><a class="subheader">Subheader</a></li>-->
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    <li><a class="waves-effect" href="{{ route('logout') }}" 
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> {{ __('Logout') }}</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</ul>                
    
    @yield('content')

    
<!-- Scripts -->
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>     

@if(count($errors))
    @foreach($errors->all() as $error)
    <script>
        M.toast({html: '{{ $error }}'});
    </script>
    @endforeach       
@endif

@if(Session::has('info'))
        <script>
            M.toast({html: '{{ session('info') }}'});
        </script>
@endif
<script>
$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.fixed-action-btn').floatingActionButton();
});       
</script>
</body>
</html>
