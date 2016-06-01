{{Form::model($agenda, [
'class' => 'form-horizontal',
'url' => action('agendaController@update', $agenda->id),
'method' => 'put'])}}

<h2>Modifier les évènements du mois de {{$agenda->mois}}</h2>

<div class="form-group">
    <label for="">Modifier la description</label>
    {{Form::textarea('contenu', null, ['class'=>'form-control'])}}
</div>

{{Form::submit('Modifier les évènements du mois de '.$agenda->mois, ['class'=>'btn btn-primary'])}}

{{Form::close()}}