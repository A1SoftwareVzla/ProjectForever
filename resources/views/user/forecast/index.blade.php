@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col  s12 m6 offset-m3"> 

    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Tus Pronósticos</span>        
        </div>
        
        <div class="card-content">
        
        @if(count(Auth::user()->forecasts()->get()))
        <table class="highlight">
        <tbody>
            @foreach(Auth::user()->forecasts()->get() as $forecast)            
            <tr>
                <td>
                <p>{{ $forecast->tournament->name}}</p>
                </td>
                <td class="center-align">
                <a href="{{ route('forecast.show', $forecast->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">visibility</i></a>
                </td>            
            </tr>
            @endforeach
        </tbody>
        </table>
        @else
        <div class="row">    
            <div class="col s12">
                No has creado ningún pronóstico aún!
            </div> 
        </div>          
        @endif         
        </div>
            <div class="card-action">
                <a href="{{ route('forecast.create') }}" class="blue-text text-darken-1"><i class="material-icons left">create</i>Crear Pronóstico</a>
                <a href="{{ route('home') }}" class="blue-text text-darken-1">Regresar</a>
            </div>
        </div>

    </div>
    </div>
</div>

@endsection