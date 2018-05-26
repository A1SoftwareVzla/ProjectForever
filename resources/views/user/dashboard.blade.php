@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col s12"> 

    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Bienvenido!</span>        
        </div>        
        <div class="card-content">        
        <p>PronostiKlo no es un sitio de apuestas, es una herramienta para administrar los pronósticos que normalmente llevabas en un computador, ahora esta App lo hace por ti en el movil.</p>
        </div>
            <div class="card-action">
                <a href="{{ route('forecast.index') }}" class="blue-text text-darken-1">ir a tus pronósticos</a>
            </div>
        </div>

    </div>
    </div>
</div>       

@endsection