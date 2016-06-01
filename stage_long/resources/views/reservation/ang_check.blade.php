@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        <h1>Your code is valid !</h1>
        <p class="alert alert-info">
            Now, you have to select your dates for your stay !
        </p>

        <h3>This code offer you a stay of {{$jours}} days !</h3>

        {{Form::open(['url'=>action('reservationController@ang_cadeauRes'), 'method'=>'post'])}}

        <div class="form-group col-md-12 text-center">
            <div style="margin: 0 auto; display:inline-block">
                <div id="datepicker"></div>
            </div>
        </div>

        {{Form::hidden('time',null,['class'=>'form-control time'])}}

        {{Form::hidden('jours', $jours)}}

        {{Form::hidden('code', $code)}}

        <button class="btn btn-primary" type="submit">
            Book my stay with these dates !
        </button>

        {{Form::close()}}


    </div>

@endsection