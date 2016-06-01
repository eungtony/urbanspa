@extends('app')

@section('content')

    <div class="container-fluid text-center" style="margin-top:60px;">

        <h1>Choisissez une formule pour votre séjour de rêve à Troyes !</h1>

        @if($lang == 'fr')

            @foreach($formules as $f)

                <div class="col-md-3 formule" style="background-image:url('{{url('/img/formules/'.$f->image)}}')">

                    <div class="formule_opacity">
                        <h3>Formule</h3>
                        <h2>{{$f->titre_formule}}</h2>
                        <hr>
                        A partir de {{$f->prix}}€ la nuit
                        <hr>
                        <p>
                            {!! $f->description !!}
                        </p>

                        <a href="{{url('/reservations/'.$f->titre_formule)}}" class="btn btn-primary">Réserver</a>
                    </div>

                </div>

            @endforeach

        @else

            @foreach($formules as $f)

                <div class="col-md-3 formule" style="background-image:url('{{url('/img/formules/'.$f->image)}}">

                    <div class="formule_opacity">
                        <h3>Formule</h3>
                        <h2>{{$f->titre_formule_ang}}</h2>
                        <hr>
                        from {{$f->prix}}€ per night !
                        <hr>
                        <p>
                            {!! $f->description_ang !!}
                        </p>

                        <a href="{{url('/en/reservations/'.$f->titre_formule)}}" class="btn btn-primary">Book</a>
                    </div>

                </div>

            @endforeach

        @endif

    </div>

@endsection