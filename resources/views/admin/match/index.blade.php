@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m8">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Listado de juegos</span>         
        <div class="row">
            <div class="col s12">                                 
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Casa</th>
                        <th colspan="3">Marcador</th>
                        <th>Visitante</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th colspan="2"></th>    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matchs as $match)
                    <tr>
                        <td>{{ $teams[$match->home_team] }}</td>
                        <td class="center-align">{{ $match->home_score }}</td>
                        <td class="center-align">x</td>
                        <td class="center-align">{{ $match->visitor_score }}</td>
                        <td>{{ $teams[$match->visitor_team] }}</td>
                        <td>{{ $match->date }}</td>
                        <td>{{ $match->time }}</td>
                        <td class="center-align">                            
                            <a href="{{ route('match.edit', $match->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                        </td>                        
                        <td class="center-align">
                        {{ Form::open(['route' => ['match.destroy', $match->id], 'method' => 'DELETE']) }}                           
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
    <div class="col m4">
        <div class="card">        
            <div class="card-content">
            {!! Form::open(['route' => 'match.store']) !!}
            <span class="card-title">Agregar juego</span>
                @include('admin.match.partials.form')
                <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Agregar juego
                    <i class="material-icons left">add</i>
                </button>
                {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>   

@endsection