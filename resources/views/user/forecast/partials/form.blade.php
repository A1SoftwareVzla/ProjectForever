<div class="row">                
    <div class="row">
        <div class="input-field col s12">            
            <h8>Elige el campeonato que pronosticarás</h8>
            {{ Form::select('tournament_id', $tournaments, null,['class' => 'browser-default']) }}            
        </div>
    </div>             
</div>