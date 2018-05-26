@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col  s12 "> 

    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Tus Grupos</span>        
        </div>
        
        <div class="card-content">
        <?php
            $pronostiklo = false;
        ?>
        @if(count(Auth::user()->groups()->get()))
        <table class="highlight">
        <tbody>
            @foreach(Auth::user()->groups()->get() as $group)
            <?php
                if($group->administrator_id == 1){
                    $pronostiklo = true;
                }
            ?>
            <tr>
                <td>
                <p>{{ $group->name}}</p>
                </td>
                <td class="center-align">
                <a href="whatsapp://send?text=http://www.pronostiklo.com/api/group/{{$group->token_invitation}}" data-action="share/whatsapp/share" class="btn-floating waves-effect waves-light orange"><i class="material-icons">share</i></a>
                </td>
                <td class="center-align">
                <a href="{{ route('group.show', $group->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">visibility</i></a>
                </td>
                
            @if($group->administrator_id == Auth::user()->id)
                <td class="center-align">
                <a href="{{ route('group.edit', $group->id) }}" class="btn-floating waves-effect waves-light orange"><i class="material-icons">edit</i></a>
                </td>
                <td class="center-align">
                    <!-- Modal Trigger -->
                    <a href="#modal{{$group->id}}" class="btn-floating waves-effect waves-light red modal-trigger"><i class="material-icons">delete_forever</i></a>
                    <!-- modal Structure -->
                    <div id="modal{{$group->id}}" class="modal">
                    <div class="modal-content">
                        <h4>Eliminar Grupo</h4>
                        <p>¿Estas seguro de querer eliminar el grupo <strong>{{ $group->name }}</strong> en el cual eres administrador?</p>
                    </div>
                    <div class="modal-footer">
                    {{ Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) }}                           
                        <button class="btn-floating waves-effect waves-light red" type="submit" name="action">
                            <i class="material-icons left">delete_forever</i>
                        </button>
                    {{ Form::close() }}
                    </div>
                    </div>               
                </td>
            @else
                <td colspan="2">&nbsp;</td>
            @endif
            </tr>
            @endforeach
        </tbody>
        </table>
        @else
        <div class="row">    
            <div class="col s12">
                <p>Usted no se ha unido, ni ha creado algún grupo aún!</p>
            </div> 
        </div>          
        @endif 
        <div class="row">
            @if(!$pronostiklo)
            <div class="col s12 center-align">
                <a href="{{ route('group.addUser', 'MQgKL720eAGBzon6SZvj') }}" class="waves-effect waves-light btn-small orange"><i class="material-icons left">group_add</i>Unir a grupo global</a>
            </div>        
            @endif
        </div>
        </div>
            <div class="card-action">
                <a href="{{ route('group.create') }}" class="blue-text text-darken-1"><i class="material-icons left">group_add</i>Crear grupo</a>
                <a href="{{ route('home') }}" class="blue-text text-darken-1">Regresar</a>
            </div>
        </div>

    </div>
    </div>
</div>

@endsection