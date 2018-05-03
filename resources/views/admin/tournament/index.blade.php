@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m5">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Listado de torneos existentes <a href="{{route('admin')}}" class="waves-effect waves-light btn orange darken-1"><i class="material-icons left">reply</i>Menú principal</a></span>
                  
        <div class="row">
            <div class="col s12">                                 
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Nombre del torneo</th>
                        <th>Simbolo</th>
                        <th colspan="3"></th>    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournaments as $tournament)
                    <tr>
                        <td>{{ $tournament->name }}</td>
                        <td width="30px">
                            <img class="responsive-img" src="{{ $tournament->symbol }}">
                        </td>
                        <td class="center-align">                            
                            <a href="{{ route('tournament.show', $tournament->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">visibility</i></a>
                        </td>
                        <td class="center-align">                            
                            <a href="{{ route('tournament.edit', $tournament->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                        </td>                        
                        <td class="center-align">
                        {{ Form::open(['route' => ['tournament.destroy', $tournament->id], 'method' => 'DELETE']) }}                           
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
    <div class="col m7">
        <div class="card">        
            <div class="card-content">
            {!! Form::open(['route' => 'tournament.store', 'files' => true]) !!}
            <span class="card-title">Nuevo torneo</span>
                @include('admin.tournament.partials.form')
                <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Agregar torneo
                    <i class="material-icons left">add</i>
                </button>
                {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>   

@endsection