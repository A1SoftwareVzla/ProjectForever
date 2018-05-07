@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m8 offset-m2">
    <div class="card">
        <div class="card-content">            
        <div class="row">
            <div class="col s12">
                {!! Form::model($tournament ,['route' => ['tournament.update', $tournament->id], 'method' => 'PUT', 'files' => true]) !!}
                <span class="card-title">Editar torneo</span>
                    @include('admin.tournament.partials.form')
                    <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Editar torneo
                        <i class="material-icons left">edit</i>
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
        </div>        
    </div>
    </div>  
</div>

@endsection