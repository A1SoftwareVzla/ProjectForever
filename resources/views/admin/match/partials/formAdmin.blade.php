<div class="row">                    
    <div class="row">
        <div class="input-field col s6">
        <h7>Equipo Casa</h7>
            {{ Form::select('home_team', $teams, null,['class' => 'browser-default']) }}
        </div>
        <div class="input-field col s6">
        <h7>Equipo Visitante</h7>
            {{ Form::select('visitor_team', $teams, null,['class' => 'browser-default']) }}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            {{ Form::text('home_score', null, ['class' => 'validate', 'id' => 'home_score']) }}
            <label for="home_score">Goles equipo casa</label>
        </div>
        <div class="input-field col s6">
            {{ Form::text('visitor_score', null, ['class' => 'validate', 'id' => 'visitor_score']) }}
            <label for="visitor_score">Goles equipo visitante</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input type="text" class="datepicker" id="date" name="date">
            <label for="date">Fecha del juego ({{$match->date}})</label>
        </div>
        <div class="input-field col s6">            
            <input type="text" class="timepicker" id="time" name="time"> 
            <label for="team">Hora del juego ({{$match->time}})</label>       
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">            
            {{ Form::select('fixture_id', $fixtures, null,['class' => 'browser-default']) }}
        </div>
    </div>    
</div>