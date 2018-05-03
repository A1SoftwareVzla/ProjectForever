@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m4 offset-m4">
    <div class="card">
        <div class="card-content">            
        <div class="row">
            <div class="col s12">
                {!! Form::model($team ,['route' => ['team.update', $team->id], 'method' => 'PUT', 'files' => true]) !!}
                <span class="card-title">Editar equipo</span>
                    @include('admin.team.partials.form')
                    <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Editar equipo
                        <i class="material-icons left">edit</i>
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
        </div>        
    </div>
    </div>
    <div class="col m2 right-align">
        <a href="{{route('team.index')}}" class="waves-effect waves-light btn orange darken-1"><i class="material-icons left">reply</i>Volver</a>
    </div> 
    <div class="col m2 right-align">
        <a href="{{route('admin')}}" class="waves-effect waves-light btn orange darken-1"><i class="material-icons left">reply_all</i>Menú principal</a>
    </div>   
</div>

@endsection