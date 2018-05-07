@extends('layouts.adminMaterialize')

@section('content')
       
<br>
<div class="row">
    <div class="col m6 offset-m3">
    <div class="card">
        <div class="card-content">            
        <div class="row">
            <div class="col s12">
                {!! Form::model($match ,['route' => ['match.update', $match->id], 'method' => 'PUT']) !!}
                <span class="card-title">Editar juego</span>
                    @include('admin.match.partials.formAdmin')
                    <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Editar juego
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