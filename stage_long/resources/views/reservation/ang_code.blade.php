@extends('app')

@section('content')


    <div class="container" style="padding-top:60px;">

        @include('flash')

        <h1>Check your code</h1>
        <p class="alert alert-info">Your code is in the mail that we went to your friend to confirm this reservation.</p>


        {{Form::open(['url'=>action('reservationController@ang_checkCode'), 'method'=>'post'])}}

        <div class="form-group">
            <label for="">Type your code here</label>
            {{Form::text('code', null, ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Check my code !</button>
        </div>

        {{Form::close()}}
    </div>

@endsection