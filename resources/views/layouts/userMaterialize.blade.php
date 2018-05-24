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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">    
<!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            background-image: url('{{asset('image/fondoPronostiKlo.jpg')}}');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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

@auth
    <div class="fixed-action-btn">
        <a href="#" data-target="slide-out" class="btn-floating btn-large orange darken-1 sidenav-trigger">
            <i class="large material-icons">menu</i>
        </a>
    </div>
@endauth

</div>  

@auth      
<ul id="slide-out" class="sidenav">
    <li>
    <div class="user-view">
      <div class="background">
        <img class="responsive-img" src="{{ asset('image/siluetaGradasMenu.png') }}">
      </div>      
      <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
      <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
    </div>
    </li>

    @yield('menuOptions')

    <!--
    <li><a href="{{route('admin')}}"><i class="material-icons">build</i>Menú Principal</a></li>
    <li><div class="divider"></div></li> 
    <li><a href="{{route('team.index')}}"><i class="material-icons">group</i>Equipos</a></li>
    <li><a href="{{route('tournament.index')}}"><i class="material-icons">widgets</i>Torneos</a></li>
    <li><a href="{{route('fixture.index')}}"><i class="material-icons">event</i>Fechas</a></li>
    <li><a href="{{route('match.index')}}"><i class="material-icons">directions_walk</i>Juegos</a></li>    
    -->
    <li><div class="divider"></div></li>        
    <li><a class="waves-effect" href="{{ route('logout') }}" 
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> {{ __('Logout') }}</a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul> 

@endauth 

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
    $('.tabs').tabs();   
    $('.tooltipped').tooltip();   
    $('.modal').modal(); 
});     

</script>

</body>
</html>
