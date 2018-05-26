@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')
<div class="container">
    <div class="row">
    <div class="col s12"> 

    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Terminos del servicio</span>        
        </div>        
        <div class="card-content">
        <p>Con PronostiKlo podrás pronosticar los resultados de los partidos de las diferentes ligas y deportes disponibles en la aplicación, en la que tu, y tus amigos podrán competir mediante la creación de grupos privados.</p>
        <br>
        <p>PronostiKlo no es un sitio de apuestas, es una herramienta para administrar los pronósticos que normalmente llevabas en un computador, ahora esta App lo hace por ti en el movil.</p>
        <br>
        <p>Para participar es necesario leer y aceptar el presente reglamento; si no está de acuerdo, absténgase de usar la aplicación.</p>
        <br>
        <p>Se permite la participación a cualquier persona que se haya registrado en esta aplicación. La participación es gratuita y se realiza exclusivamente pronosticando resultados.</p>
        <br>
        <p>Se puede participar en el grupo global de la aplicación <strong>PronostiKlo</strong>, para participar en otros grupos debe ser invitado por algún amigo, También puede crear su propio grupo e invitar a sus amigos a unirse a el.</p>
        <br>
        <p>El participante autoriza el envío de mensajes a su dirección de correo electrónico</p>
        <br>
        <p>PronostiKlo no se hace responsable de cualquier hecho propio o de causa mayor, en caso de que algún juego tenga que ser suspendido, pospuesto o cancelado, o fallas de las comunicaciones por nuestra parte.</p>
        <br>
        <p>Esta aplicación requiere para su funcionamiento conexión a internet a través de la red del operador celular o de una red WiFi. PronostiKlo no se hace responsable por los problemas que el acceso a internet pueda ocasionarle a los usuarios.</p>
        </div>
            <div class="card-action">
                <a href="{{ route('home') }}" class="blue-text text-darken-1">Regresar</a>
            </div>
        </div>

    </div>
    </div>
</div>    

@endsection