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
        @foreach($tournament->fixtures as $fixture)
        <ul class="collapsible popout">
        
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
                       
        </ul> 
        @endforeach
        <br>      
        
        </div>
        <div id="ranking" class="col s12">
        <div class="center-align">
        <h5>Tienes <strong>{{ $forecast->score }}</strong> puntos acumulados!</h5>
        @foreach($user->groups()->get() as $group) 
        <?php 
            $position=0; 
            $ranking = collect();
        ?>

        @foreach($group->users()->get() as $userGroup)
            @foreach($userGroup->forecasts()->get() as $fore)
                @if($fore->tournament_id == $forecast->tournament_id)
                    <?php 
                        $ranking->push(['idUsuario' => $userGroup->id,'usuario' => $userGroup->name,  'puntos' => $fore->score]);
                    ?>       
                @endif
            @endforeach
        @endforeach
        
        <?php
            $rankingSorted = $ranking->sortByDesc('usuario');
            $total = count($rankingSorted);
            $pos=1;
            $posFinal=1;
            foreach($rankingSorted as $ran){
                if($ran['idUsuario'] == Auth::user()->id){
                    $posFinal = $pos;
                }else{
                    $pos = $pos + 1;
                }
            }                    
        ?>
        <ul class="collapsible popout">
            <li>
                <div class="collapsible-header"><i class="material-icons">group</i>{{$group->name}}<span class="new badge orange" data-badge-caption=" ">{{$posFinal}} de {{$total}}</span></div>
                <div class="collapsible-body">
                    <table class="highlight">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="80%">NOMBRE DEL JUGADOR</th>
                            <th width="10%">PTOS</th>                    
                        </tr>
                    </thead>
                    <tbody>                
                
                    @foreach($rankingSorted as $rank)
                        
                        <?php $position = $position +1; ?>
                        @if($rank['idUsuario'] == Auth::user()->id)
                        <tr style="color:rgb(255,164,032);font-size:20px;">
                        @else
                        <tr>
                        @endif
                            <td width="5%" class="center-align">{{ $position }}</td>
                            <td width="80%">{{ $rank['usuario'] }}</td>
                            <td width="10%">{{ $rank['puntos'] }}</td>
                        </tr>                
                        
                    @endforeach
               
                    </tbody>
                    </table>
                </div>
            </li> 
        </ul>              
        @endforeach
        <br>
        </div>
        </div>    
    </div>

@endsection