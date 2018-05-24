<div class="row"> 
    {{Form::hidden('administrator_id', Auth::user()->id)}}                 
    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('name', null, ['class' => 'validate', 'id' => 'name']) }}
            <label for="name">Nombre del grupo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {{ Form::textarea('description', null, ['class' => 'validate materialize-textarea', 'id' => 'description']) }}
            <label for="description">Descripción, reglas y premios del grupo</label>
        </div>
    </div>             
</div>