<div class="row">                    
    <div class="row">
        <div class="input-field col s12">
            <!-- <input id="name" name="name" type="text" class="validate"> -->
            {{ Form::text('name', null, ['class' => 'validate', 'id' => 'name']) }}
            <label for="name">Nombre del equipo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <!-- <input id="short_name" name="short_name" type="text" class="validate"> -->
            {{ Form::text('short_name', null, ['class' => 'validate', 'id' => 'short_name']) }}
            <label for="short_name">Abreviatura</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <spam>Icono del equipo (100px x 100px)(.png)</spam>
            {{ Form::file('symbol') }}                            
        </div>
    </div>             
</div>