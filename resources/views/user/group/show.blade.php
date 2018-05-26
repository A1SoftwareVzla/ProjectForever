@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
        <div class="col s12">
        <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title"><strong>{{ $group->name }}</strong></span>        
        </div>
        
        <div class="card-content">
           
                <strong>Descripción:</strong> {{ $group->description }}
                <table class="highlight">
                <thead>
                    <tr>
                        <th>Miembros del Grupo</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($group->users()->get() as $user)    
                    <tr>
                        <td>{{ $user->name }}</td>
                    </tr>
                @endforeach      
                </tbody>
                </table> 
                         
            </div>
            <div class="card-action">
            <a href="{{ route('group.index') }}" class="blue-text text-darken-1">Regresar</a>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection