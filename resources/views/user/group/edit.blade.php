@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col s12 ">
    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Editar Grupo</span>        
        </div>
        
        <div class="card-content">
        {!! Form::model($group ,['route' => ['group.update', $group->id], 'method' => 'PUT']) !!}    
            @include('user.group.partials.form')
            <button class="btn waves-effect waves-light orange darken-1" type="submit" name="action">Editar Grupo
                <i class="material-icons left">group_add</i>
            </button>            
        {{ Form::close() }}       
        </div>
        
    </div>
    </div>
    </div>
</div>

@endsection