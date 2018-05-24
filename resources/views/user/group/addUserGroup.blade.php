@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12 m6 offset-m3">
        <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Invitación a grupo</span>        
        </div>
        
        <div class="card-content">  
                <p>Felicitaciones {{Auth::user()->name}}!</p>
                <p>Has sido invitado(a) a un grupo donde podrás medir tus habilidades pronosticando resultados en los deportes con tus amigos!</p>
                
            </div>
            <div class="card-action">
            <a href="{{ route('group.addUser', $token) }}" class="blue-text text-darken-1">Aceptar</a>
            <a href="{{ route('home') }}" class="blue-text text-darken-1">Declinar</a>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection