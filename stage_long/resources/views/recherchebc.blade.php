@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        <a href="{{url('/admin')}}" class="btn btn-primary">Retourner en arrière</a>

        <h1>
            {{$data->id}} est le numéro de réservation de {{$data->nom}} {{$data->prenom}}
        </h1>
        <h3>Formule {{$data->formule}}</h3>
        <h4>Début du séjour: {{$data->debut_sejour}} - Fin du séjour: {{$data->fin_sejour}}</h4>

        <h1>Options associées à cette reservation</h1>

        <ul>
            @foreach($data->options as $o)
                <li><h3>{{$o->nom_option}}</h3></li>
            @endforeach
        </ul>

        <div class="text-right">
            <h1>Que voulez-vous faire de la commande ?</h1>
            <a href="{{action('cadeauController@destroy',$data->id)}}" class="btn btn-danger"
               data-method="delete"
               data-confirm="Êtes-vous sur de bien vouloir supprimer cette réservation ?">Supprimer la
                réservation</a>

            @if($data->paye == 1)

                <button class="btn btn-success">
                    La paiement de cette réservation a été effectué !
                </button>

            @else

                {{Form::open(['action' => ['cadeauController@update', $data->id], 'method' => 'put'])}}

                <button class="btn btn-warning" type="submit">
                    Accepter le paiement !
                </button>

                {{Form::close()}}

            @endif
        </div>

    </div>

@endsection