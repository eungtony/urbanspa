@extends('app')

@section('content')


    <div class="container" style="padding-top:60px;">

        @include('flash')

        <h1>Vérifier mon code cadeau</h1>
        <p class="alert alert-info">Votre code cadeau se trouve dans le mail que nous avons envoyé à votre proche pour
            confirmer sa réservation.</p>


        {{Form::open(['url'=>action('reservationController@checkCode'), 'method'=>'post'])}}

        <div class="form-group">
            <label for="">Tapez votre code cadeau</label>
            {{Form::text('code', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Vérifier mon code cadeau</button>
        </div>

        {{Form::close()}}
    </div>

@endsection