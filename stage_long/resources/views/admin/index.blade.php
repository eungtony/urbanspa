@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        @include('flash')

        <h1>Liste des formules <a href="{{action('FormuleController@index')}}" class="btn btn-primary">Ajouter une
                formule</a>
        </h1>

        @foreach($formule as $f)

            <a href="{{action('FormuleController@edit', $f)}}" class="btn btn-primary">Formule {{$f->titre_formule}}</a>

        @endforeach

        <h1>Agenda</h1>

        @foreach($agenda as $a)

            <a href="{{action('agendaController@edit', $a->id)}}" class="btn btn-primary">{{$a->mois}}</a>

        @endforeach


        <h1>Recherchez une réservation avec le numéro de réservation</h1>

        {!! Form::open(['method'=>'get', 'url'=> route('recherche')]) !!}
        <label for="">Rechercher une réservation</label>
        <input type="number" name="research" class="form-control" placeholder="Tapez le numéro de réservation"/>
        {{Form::close()}}

        <hr>

        @if($reservations->isEmpty())
            <p class="alert alert-warning">
                Aucune réservation disponible.
            </p>
        @else

            <div class="table-responsive">
                <table class="table" ng-controller="resController">

                    <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Formule</th>
                    <th>Type de paiement</th>
                    <th>Date de début du séjour</th>
                    <th>Date de fin du séjour</th>
                    <th>Paiement</th>
                    <th>Supprimer la réservation</th>
                    <th>Voir la réservation</th>
                    </thead>

                    <tbody>
                    @foreach($reservations as $r)
                        <tr>

                            <td>{{$r->nom}}</td>
                            <td>{{$r->prenom}}</td>
                            <td>{{$r->mail}}</td>
                            <td>{{$r->numero_telephone}}</td>
                            <td>{{$r->formule}}</td>
                            <td>{{$r->type_paiement}}</td>
                            <td>{{$r->debut}}</td>
                            <td>{{$r->fin}}</td>

                            <td>
                                @if($r->paye == 0)
                                    {{Form::open(['action' => ['reservationController@update', $r->id], 'method' => 'put'])}}

                                    <button class="btn btn-warning confirmation" type="submit">
                                        Accepter le paiement !
                                    </button>

                                    {{Form::close()}}
                                @else
                                    <button class="btn btn-success">
                                        La paiement a été effectué !
                                    </button>
                                @endif
                            </td>

                            <td>
                                <a href="{{action('HomeController@destroy',$r)}}" class="btn btn-danger"
                                   data-method="delete"
                                   data-confirm="Êtes-vous sur de bien vouloir supprimer cette réservation ?">Supprimer
                                    la
                                    réservation</a>
                            </td>

                            <td>
                                <a href="{{action('HomeController@show', $r->id)}}" class="btn btn-primary">Voir</a>
                            </td>
                            <td>
                                <?php

                                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $r->debut);
                                $difference = ($date->diff($now)->days < 1)
                                        ? 'today'
                                        : $date->diffInDays($now);
                                ?>
                                J - {{$difference}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $reservations->render() !!}

            </div>

        @endif

        <hr>

        <h1>Liste des bons cadeaux</h1>

        <h1>Recherchez un bon cadeau avec le numéro de réservation</h1>

        {!! Form::open(['method'=>'get', 'url'=> action('cadeauController@index')]) !!}
        <label for="">Rechercher un bon cadeau</label>
        <input type="number" name="research" class="form-control" placeholder="Tapez le numéro de réservation"/>
        {{Form::close()}}

        @if($cadeaux->isEmpty())
            <p class="alert alert-warning">
                Aucun bon cadeau disponible.
            </p>
        @else

            <div class="table-responsive">
                <table class="table" ng-controller="resController">

                    <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Formule</th>
                    <th>Type de paiement</th>
                    <th>Date de début du séjour</th>
                    <th>Date de fin du séjour</th>
                    <th>Paiement</th>
                    <th>Supprimer la réservation</th>
                    <th>Voir la réservation</th>
                    </thead>

                    <tbody>
                    @foreach($cadeaux as $r)
                        <tr>

                            <td>{{$r->nom}}</td>
                            <td>{{$r->prenom}}</td>
                            <td>{{$r->mail}}</td>
                            <td>{{$r->numero_telephone}}</td>
                            <td>{{$r->formule}}</td>
                            <td>{{$r->type_paiement}}</td>
                            <td>{{$r->debut_sejour}}</td>
                            <td>{{$r->fin_sejour}}</td>
                            <td>
                                @if($r->paye == 0)
                                    {{Form::open(['action' => ['cadeauController@update', $r->id], 'method' => 'put'])}}

                                    <button class="btn btn-warning confirmation" type="submit">
                                        Accepter le paiement !
                                    </button>

                                    {{Form::close()}}
                                @else
                                    <button class="btn btn-success">
                                        La paiement a été effectué !
                                    </button>
                                @endif
                            </td>


                            <td>
                                <a href="{{action('cadeauController@destroy',$r)}}" class="btn btn-danger"
                                   data-method="delete"
                                   data-confirm="Êtes-vous sur de bien vouloir supprimer cette réservation ?">Supprimer
                                    la
                                    réservation</a>
                            </td>
                            <td>
                                <a href="{{action('cadeauController@show', $r->id)}}" class="btn btn-primary">Voir</a>
                            </td>
                            <td>
                                <?php

                                $date = \Carbon\Carbon::createFromFormat('Y-m-d', $r->debut_sejour);
                                $difference = ($date->diff($now)->days < 1)
                                        ? 'today'
                                        : $date->diffInDays($now);
                                ?>
                                J - {{$difference}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

                {!! $reservations->render() !!}

            </div>

        @endif

    </div>

@endsection