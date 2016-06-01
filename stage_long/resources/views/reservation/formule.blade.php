@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        {{Form::open(['method' => 'post', 'url' => action('FormuleController@store'), 'files' => true])}}

        <div class="form-group col-md-6">
            <label for="">Le nom de la nouvelle formule</label>
            {{Form::text('titre_formule', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Le nom de la nouvelle formule (en anglais)</label>
            {{Form::text('titre_formule_ang', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Description nouvelle formule</label>
            {{Form::textarea('description', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Description de la nouvelle formule (en anglais)</label>
            {{Form::textarea('description_ang', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-12">
            <label for="">Définissez un prix pour cette nouvelle formule</label>
            {{Form::number('prix', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <label for="">Ajouter une image pour illustrer la formule</label>
            {!! Form::file('image',['class'=>'form-control']) !!}
        </div>

        {{Form::submit('Ajouter cette formule', ['class'=>'btn btn-primary'])}}

        {{Form::close()}}

    </div>

    @endsection