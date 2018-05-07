@extends('layouts.adminMaterialize')

@section('content')

<br>
<div class="row">
    <div class="col m8">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Información del torneo <strong>{{$tournament->name}}</strong></span>
        <div class="row">
            <div class="col s12">                                 
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Simbolo</th>
                        <th>Equipos asociados</th>    
                    </tr>
                    </thead>
                    <tbody>
                        <td><img class="responsive-img" src="{{$tournament->symbol}}" alt=""></td>
                        <td>
                            <ul>
                            @foreach($tournament->teams as $team)
                                <li>{{$team->name}}</li>
                            @endforeach   
                            </ul>                     
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="col m4">
    <div class="card">
        <div class="card-content">        
        <span class="card-title">Fondo del torneo</span>
        <div class="row">
            <div class="col s12">                                 
                <img class="responsive-img"  src="{{$tournament->image}}" alt="">
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection