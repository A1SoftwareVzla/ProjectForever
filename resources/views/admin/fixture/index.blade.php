@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m9">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Listado de fechas</span>         
        <div class="row">
            <div class="col s12">                                 
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Nombre de la fecha</th>
                        <th>Descripción</th>
                        <th>Torneo Asociado</th>
                        <th colspan="2"></th>    
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fixtures as $fixture)
                    <tr>
                        <td>{{ $fixture->name }}</td>
                        <td>{{ $fixture->description }}</td>
                        <td>{{ $fixture->tournament->name }}</td>
                        <td class="center-align">                            
                            <a href="{{ route('fixture.edit', $fixture->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                        </td>                        
                        <td class="center-align">
                        {{ Form::open(['route' => ['fixture.destroy', $fixture->id], 'method' => 'DELETE']) }}                           
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
            {!! Form::open(['route' => 'fixture.store']) !!}
            <span class="card-title">Nueva fecha</span>
                @include('admin.fixture.partials.form')
                <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Agregar fecha
                    <i class="material-icons left">add</i>
                </button>
                {!! Form::close() !!}
            </div>      
        </div>
    </div>
</div>   

@endsection