@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        <a href="{{url('/admin')}}" class="btn btn-primary">Retourner en arrière</a>

        @include('flash')

        <h1>Ajouter une option à la formule {{$formule}}</h1>

        {{Form::open(['method' => 'post', 'url' => action('FormuleController@storeOption', $id)])}}

        {{Form::hidden('formule_id', $id)}}

        <div class="form-group col-md-6">
            <label for="">Titre de l'option</label>
            {{Form::text('options', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Titre de l'option en anglais</label>
            {{Form::text('option_ang', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Ajoutez l'info-bulle</label>
            {{Form::text('infos', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-6">
            <label for="">Ajoutez l'info-bulle en anglais</label>
            {{Form::text('infos_ang', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group col-md-12">
            <label for="">Définissez le prix de l'option</label>
            {{Form::number('prix', null, ['class'=>'form-control'])}}
        </div>

        <button class="btn btn-primary">Ajouter l'option</button>

        {{Form::close()}}
    </div>

@endsection