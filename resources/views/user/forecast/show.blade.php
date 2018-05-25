@extends('layouts.userMaterialize')

@include('user.partials.menu')

@section('content')

    <div class="col s12 center-align" style="background-color:rgb(255,255,255,0.75);">
        <ul id="tabs-swipe-user" class="tabs">
            <li class="tab col s6"><a class="active" href="#quiniela">Tu pronóstico</a></li>
            <li class="tab col s6"><a href="#ranking">Ranking</a></li>
        </ul>
        <div id="quiniela" class="col s12">
        
            <h5>{{ $tournament->name }}</h5>                
        <ul class="collapsible popout">
        @foreach($tournament->fixtures as $fixture)
            <li>
            <div class="collapsible-header"><i class="material-icons">event</i>{{ $fixture->name }}</div>
            <div class="collapsible-body">
            @foreach($fixture->matches as $match)
<!-- Inicio del bloque del forecast -->            
            <div class="row valign-wrapper center-align">
                <div class="col s3">
                    <img class="responsive-img" src="{{ $teams[$match->home_team-1]->symbol }}" alt="">
                </div>
                <div class="col s6">
                    <div class="row">
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="top" data-tooltip="Gana {{ $teams[$match->home_team-1]->name }}">1</a>
                        </div>
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="top" data-tooltip="Empatan">X</a>
                        </div>
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="top" data-tooltip="Gana {{ $teams[$match->visitor_team-1]->name }}">2</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="bottom" data-tooltip="Empatan a cero">0</a>
                        </div>
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="bottom" data-tooltip="1 gol de diferencia">1</a>
                        </div>
                        <div class="col s4">
                            <a class="btn tooltipped" data-position="bottom" data-tooltip="2 goles o más de diferencia">2</a>
                        </div>
                    </div> 
                </div>
                <div class="col s3">
                    <img class="responsive-img" src="{{ $teams[$match->visitor_team-1]->symbol }}" alt="">
                </div>
            </div>
            <div class="row valign-wrapper center-align">
                <div class="col s3">
                {{ $teams[$match->home_team-1]->name }}
                </div>
                <div class="col s6">
                    <h7><i class="tyni material-icons">event</i> {{ $match->date }} | <i class="tyni material-icons">watch_later</i> {{ $match->time }}</h7>
                </div>
                <div class="col s3">
                {{ $teams[$match->visitor_team-1]->name }}
                </div>                
            </div>  
            <div class="divider"></div>
<!-- fin del bloque del forecast -->
            @endforeach
            </div>            
            </li> 
        @endforeach               
        </ul> 
        <br>      
        
        </div>
        <div id="ranking" class="col s12">
        <div class="container">
            <table class="highlight">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="80%">NOMBRE DEL JUGADOR</th>
                    <th width="10%">PTOS</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="5%">1</td>
                    <td width="80%">JOSE ORTEGA</td>
                    <td width="10%">70</td>
                </tr>
                <tr>
                    <td width="5%">2</td>
                    <td width="80%">FRANKLYN ORTEGA</td>
                    <td width="10%">67</td>
                </tr>
                <tr>
                    <td width="5%">3</td>
                    <td width="80%">JAVIER ROMERO</td>
                    <td width="10%">63</td>
                </tr>
                <tr>
                    <td width="5%">104</td>
                    <td width="80%">CESAR LOBO</td>
                    <td width="10%">60</td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>    
    </div>

@endsection