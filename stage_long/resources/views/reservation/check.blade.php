@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        <h1>Votre code est valide !</h1>
        <p class="alert alert-info">
            Désormais, sélectionner une date qui pourrait vous intéresser pour votre séjour !
        </p>

        <h3>Votre bon cadeau est un séjour pour {{$jours}} jours !</h3>

        {{Form::open(['url'=>action('reservationController@cadeauRes'), 'method'=>'post'])}}

        <div class="form-group col-md-12 text-center">
            <div style="margin: 0 auto; display:inline-block">
                <div id="datepicker"></div>
            </div>
        </div>

            {{Form::hidden('time',null,['class'=>'form-control time'])}}

        {{Form::hidden('jours', $jours)}}

        {{Form::hidden('code', $code)}}

        <button class="btn btn-primary" type="submit">
            Réserver mon séjour à cette date !
        </button>

        {{Form::close()}}


    </div>

@endsection