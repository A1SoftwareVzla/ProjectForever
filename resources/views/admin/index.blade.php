@extends('layouts.adminMaterialize')

@section('content')
<div class="container">
    <div class="row">
        
        <br>

        <div class="col s12 m3">
            <div class="card hoverable">
                <div class="card-image">
                <img src="{{ asset('/image/soccer.jpg') }}">
                <span class="card-title">Equipos</span>
                <a href="{{ route('team.index') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">build</i></a>
                </div>
                <div class="card-content">
                <p>En ésta sección podrá crear, modificar y eliminar equipos.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card hoverable">
                <div class="card-image">
                <img src="{{ asset('/image/Beisbol.jpg') }}">
                <span class="card-title">Torneos</span>
                <a href="{{ route('tournament.index') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">build</i></a>
                </div>
                <div class="card-content">
                <p>En ésta sección podrá crear, modificar y eliminar torneos. Además de seleccionar los equipos que jugarán dicho torneo, éstos deben de estar previamente creados en la sección de Equipos.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card hoverable">
                <div class="card-image">
                <img src="{{ asset('/image/americano.jpg') }}">
                <span class="card-title">Fechas</span>
                <a href="{{ route('fixture.index') }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">build</i></a>
                </div>
                <div class="card-content">
                <p>En ésta sección podrá crear, modificar y eliminar fechas para los diferentes torneos previamente creados en la sección de Torneos.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m3">
            <div class="card hoverable">
                <div class="card-image">
                <img src="{{ asset('/image/basketball.jpg') }}">
                <span class="card-title">Juegos</span>
                <a href="{{route('match.index')}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">build</i></a>
                </div>
                <div class="card-content">
                <p>En ésta seción podrá crear los juegos de las diferentes fechas creadas previamente en la sección de Fechas.</p>
                </div>
            </div>
        </div>            
        
    </div>
</div>
@endsection