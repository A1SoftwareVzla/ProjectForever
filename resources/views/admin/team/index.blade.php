@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m9">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Listado de equipos existentes</span>         
        <div class="row">
            <div class="col s12">                                 
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Nombre del equipo</th>
                        <th>Abreviatura</th>
                        <th>Icono</th>
                        <th colspan="2"></th>    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->short_name }}</td>
                        <td width="30px">
                            <img class="responsive-img" src="{{ $team->symbol }}">
                        </td>
                        <td class="center-align">                            
                            <a href="{{ route('team.edit', $team->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                        </td>                        
                        <td class="center-align">
                        {{ Form::open(['route' => ['team.destroy', $team->id], 'method' => 'DELETE']) }}                           
                            <button class="btn-floating waves-effect waves-light red" type="submit" name="action">
                                <i class="material-icons left">delete_forever</i>
                            </button>
                        {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach                                     
                    </tbody>
                </table>
            </div>
        </div>
        </div>        
    </div>
    </div>
    <div class="col m3">
        <div class="card">        
            <div class="card-content">
            {!! Form::open(['route' => 'team.store', 'files' => true]) !!}
            <span class="card-title">Nuevo equipo</span>
                @include('admin.team.partials.form')
                <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Agregar equipo
                    <i class="material-icons left">add</i>
                </button>
                {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>   

@endsection