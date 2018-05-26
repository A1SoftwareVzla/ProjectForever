@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col s12">
    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Crear Pronóstico</span>        
        </div>
        
        <div class="card-content">        
        {{ Form::open(['route' => 'forecast.store']) }}
            
            @include('user.forecast.partials.form')
            <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Crear Pronóstico
                <i class="material-icons left">create</i>
            </button>            
        {{ Form::close() }}       
        </div>
        
    </div>
    </div>
    </div>
</div>

@endsection