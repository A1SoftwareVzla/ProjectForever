@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

<div class="container">
    <div class="row">
    <div class="col s12"> 

    <div class="card">
        
        <div class="card-image">
          <img src="{{asset('image/siluetaGradas.png')}}">  
          <span class="card-title">Ayuda</span>        
        </div>        
        <div class="card-content">        
        
        <p>Lo primero que debe hacer es crear un pronóstico de alguna de las ligas activas en la aplicación, para esto seleciones "Tus Pronósticos" en el menú lateral y cree un pronóstico, allí elija una de las ligas activas y comience a pronosticar! tendrá hasta 15 minutos antes de cada partido para cambiar su pronóstico.</p>
        <br>
        <p>Para competir y disfrutar con tus amigos puedes seleccionar "Tus grupos" en el menú lateral y crear un grupo el cual luego podrá compartir vía Whatsapp enviando invitaciones a sus familiares y amigos, también podrá unirse al Grupo Global "PronostiKlo" y así competir con toda la comunidad de la aplicación.</p>
        <br>
        <h6>Acerca del juego</h6>
        <br>
        <p>El objetivo del juego es acumular el mayor puntaje posible acertando los pronósticos de los partidos.</p>
        <br>
        <p>En cada partido, podrás elegir "1", "X" ó "2", si eliges "1" estarás pronosticando que gana el equipo casa, si eliges "X" estaras pronosticando un empate y si eliges "2" estarás pronosticando que gana el equipo visitante.</p>
        <br>
        <p>Luego tendrás que elegir la diferencia de goles en caso de haber pronosticado algún ganador; en caso de haber pronosticado un empate deberá pronosticar a cuantos goles empatarán.</p>
        <br>
        <p>Cada pronóstico acertado sumará 3 puntos a tu pronóstico global de la liga, los pronósticos errados no sumarán ningun punto y tampoco restaran.</p>
        <br>
        <p>Los resultados que se utilizarán para definir los aciertos serán los que ocurran luego del pitazo final del tiempo reglamentario (en caso del futbol, 90 minutos). </p>
        <br>
        <p>Esta aplicación no entrega premios a los ganadores (a menos que exista una promoción en el grupo "Pronostiklo", dentro de cada grupo, los jugadores deberán definir por su propia cuenta, que premios se entregarán entre ellos. La aplicación solo informará a los jugadores los puntajes obtenidos y las posiciones dentro de cada grupo.</p>
        </div>
            <div class="card-action">
                <a href="{{ route('home') }}" class="blue-text text-darken-1">regresar</a>
            </div>
        </div>

    </div>
    </div>
</div>       

@endsection