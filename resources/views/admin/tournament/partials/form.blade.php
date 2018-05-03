<div class="row">                    
    <div class="row">
        <div class="input-field col s12">
            {{ Form::text('name', null, ['class' => 'validate', 'id' => 'name']) }}
            <label for="name">Nombre del torneo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">            
            {{ Form::textarea('description', null, ['class' => 'validate', 'id' => 'description']) }}
            {{ Form::label('description', 'Descripción del torneo')}}
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            {{ Form::label('teams', 'Equipos asociados') }}
            <div>
                @foreach($teams as $team)
                    <label>
                        {{ Form::checkbox('teams[]', $team->id) }} <span>{{ $team->name }}</span>
                    </label>
                @endforeach 
            </div>                      
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <spam>Ícono del torneo (100px x 100px)(.png)</spam>
            {{ Form::file('symbol') }}                            
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <spam>Fondo de pantalla (800px x 1200px)(.png)</spam>
            {{ Form::file('image') }}                            
        </div>
    </div>             
</div>