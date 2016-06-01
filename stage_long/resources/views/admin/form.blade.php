{{Form::model($formule, [
'class' => 'form-horizontal',
'url' => action('FormuleController@update', $formule),
'method' => 'put',
'files' => true])}}

<h2>Modifier la formule {{$formule->titre_formule}}</h2>

<div class="container">

    <div class="form-group col-md-6">
        <label for="">Modifier le titre de la formule</label>
        {{Form::text('titre_formule', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group col-md-6">
        <label for="">Modifier le titre en anglais de la formule</label>
        {{Form::text('titre_formule_ang', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group col-md-6">
        <label for="">Modifier la description</label>
        {{Form::textarea('description', null, ['class'=>'form-control'])}}
    </div>


    <div class="form-group col-md-6">
        <label for="">Modifier la description anglaise</label>
        {{Form::textarea('description_ang', null, ['class'=>'form-control'])}}
    </div>

    <div class="form-group col-md-12">
        <label for="">Modifier le prix</label>
        {{Form::number('prix', null, ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        <label for="">Modifier l'illustration de la formule</label>
        {!! Form::file('image',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="">
            {!! Form::checkbox('online',1,$formule->online) !!}
            Publier la formule ?
        </label>
    </div>

    {{Form::submit('Modifier cette formule', ['class'=>'btn btn-primary'])}}

    {{Form::close()}}

    <hr>

    <h2>Options disponibles avec cette formule <a href="{{action('FormuleController@addOption', $formule->id)}}" class="btn btn-primary">Ajouter une option à cette formule</a></h2>

    <div class="container">
        @foreach($formule->options as $o)

            {{Form::open(['method' => 'post', 'url' => action('FormuleController@update_option', $o->id)])}}

            <div class="form-group col-md-10">
                <label for="">Modifier la decription de l'option</label>
                {{Form::text('options', $o->options, ['class'=>'form-control'])}}
            </div>
            <div class="form-group col-md-2">
                <label for="">Modifier le prix de l'option</label>
                {{Form::number('prix', $o->prix, ['class'=>'form-control'])}}
            </div>

            <div class="form-group col-md-12">
                <label for="">Modifier l'info-bulle</label>
                {{Form::text('infos', $o->infos, ['class'=>'form-control'])}}
            </div>

            <div class="form-group col-md-6">
                <label for="">Modifier le nom de l'option en anglais</label>
                {{Form::text('option_ang', $o->option_ang, ['class'=>'form-control'])}}
            </div>

            <div class="form-group col-md-6">
                <label for="">Modifier l'info-bulle en anglais</label>
                {{Form::text('infos_ang', $o->infos_ang, ['class'=>'form-control'])}}
            </div>

            <button class="btn btn-primary">Modifier l'option</button>
            <a href="{{action('FormuleController@destroy', $o->id)}}" data-method="delete"
               data-confirm="Voulez-vous réellement supprimer cette option de la formule ?"
               class="btn btn-danger text-right">Supprimer l'option</a>

            {{Form::close()}}

            <hr>

        @endforeach
    </div>

</div>
