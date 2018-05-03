<div class="row">                    
    <div class="row">
        <div class="input-field col s12">
            <!-- <input id="name" name="name" type="text" class="validate"> -->
            {{ Form::text('name', null, ['class' => 'validate', 'id' => 'name']) }}
            <label for="name">Nombre de la fecha</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <!-- <input id="short_name" name="short_name" type="text" class="validate"> -->
            {{ Form::text('description', null, ['class' => 'validate', 'id' => 'description']) }}
            <label for="description">Descripción</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">            
            {{ Form::select('tournament_id', $tournaments, null,['class' => 'browser-default']) }}
        </div>
    </div>
                 
</div>