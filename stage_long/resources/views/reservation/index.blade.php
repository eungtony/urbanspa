@extends('app')

@section('content')

    @if($lang == 'fr')

        <div class="container-fluid formule_header" style="background-image:url('{{url('/img/formules/'.$id_formule.'.jpg')}}');">
            <div class="container-fluid header_formule">
                <h1 class="text-center">Réserver votre séjour à Troyes !</h1>

                <h3 class="text-center">Vous avez choisi la formule {{$formule}}</h3>

                <p class="text-center">Vous souhaitez offrir ce séjour ? <a
                            href="{{url('/cadeau/'.$formule)}}">Cliquez ici</a> !</p>

                <p class="text-center">
                    Si vous souhaitez faire une réservation dans la semaine, veuillez nous contacter par mail ou
                    téléphone !
                </p>
            </div>
        </div>

        <div class="container" style="margin-top:30px;">

            @include('flash')

            {{Form::open(['url'=>action('reservationController@getCheckout')])}}

            {{Form::hidden('formule', $formule)}}

            {{Form::hidden('lang', $lang)}}

            <div class="col-md-6">

                <div class="form-group col-md-6">
                    <label for="">Nom</label>
                    {{Form::text('nom',null,['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-6">
                    <label for="">Prénom</label>
                    {{Form::text('prenom',null,['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-12">
                    <label for="">Votre adresse</label>
                    {{Form::text('adresse', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-6">
                    <label for="">Code postal</label>
                    {{Form::number('code_postal', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-6">
                    <label for="">Ville</label>
                    {{Form::text('ville', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-6">
                    <label for="">Votre adresse mail</label>
                    {{Form::email('mail', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group col-md-6">
                    <label for="">Votre numéro de téléphone</label>
                    {{Form::text('numero_telephone', null, ['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right"
                           title="Vous souhaitez payer votre séjour en espèce ou en chèque !">
                        {{Form::checkbox('espece')}}
                        Paiment par espèce/chèque !
                    </label>
                </div>
                <div class="form-group">
                    <p class="alert alert-warning">
                        En ne cochant pas cette case, vous effectuerez un paiement par Paypal ou CB (si vous ne possédez
                        pas
                        de
                        compte paypal).
                    </p>
                    <p class="alert alert-success">
                        En payant par Paypal ou CB, vous ne paierez pour le moment que 50% du prix total !
                    </p>
                </div>

                <div class="form-group col-md-12">
                    {{Form::hidden('time',null,['class'=>'form-control time'])}}
                </div>

                {{Form::hidden('jours', 0, ['class'=>'form-control jour'])}}

            </div>

            <div class="col-md-3">

                <h4 class="text-center">Options disponibles avec la formule choisie</h4>

                <hr>

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right"
                           title="Nous anticiperons votre arrivée !">
                        {{Form::checkbox('Arrivée anticipée', 30)}}
                        Arrivée anticipée
                    </label>
                </div>

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right"
                           title="Nous préparons votre départ tardif">
                        {{Form::checkbox('Départ tardif', 30)}}
                        Départ tardif
                    </label>
                </div>

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right"
                           title="Nous préparerons votre arrivée anticipée ainsi que votre départ tardif !">
                        {{Form::checkbox('Arrivée anticipée + Départ tardif', 50)}}
                        Arrivée anticipée + Départ tardif
                    </label>
                </div>

                @foreach($options as $o)

                    <div class="form-group">
                        <label for="" data-toggle="tooltip" data-placement="right title="{{$o->infos}}">
                        {{Form::checkbox($o->options, $o->prix)}}
                        {{$o->options}}
                        </label>
                    </div>

                @endforeach

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right" title="Info ménages...">
                        {{Form::checkbox('Ménage', 30)}}
                        Ménage
                    </label>
                </div>

                <div class="form-group">
                    <label for="" data-toggle="tooltip" data-placement="right"
                           title="Massage de 30min pour 60€/personnes !">
                        {{Form::checkbox('Massage', 60)}}
                        Massage
                    </label>
                </div>

                <hr>

            </div>

            <div class="col-md-3">

                <p>Nombre de jours</p>

                <hr>

                <div class="form-group col-md-12 text-center">
                    @while($i <= 7 && $n <= 7)
                        <a class="btn btn-primary jour{{$n++}}" style="margin-bottom:10px;">{{$i++}}</a>
                    @endwhile
                </div>

                <hr>

                <p>Sélectionnez la date du début de votre séjour</p>

                <hr>

                <div class="form-group text-center">
                    <div style="margin: 0 auto; display:inline-block">
                        <div id="datepicker"></div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary">Réserver mon séjour</button>
            </div>

            {{Form::close()}}

            @else

                <div class="container-fluid formule_header"
                     style="background-image:url('{{url('/img/formules/'.$id_formule.'.jpg')}}');">
                    <div class="container-fluid header_formule">
                        <h1 class="text-center">Book your stay at Troyes !</h1>

                        <h3 class="text-center">You choose the {{$formule}} one</h3>

                        <p class="text-center">You would like to offer this stay ? <a
                                    href="{{url('/en/cadeau/'.$formule)}}">Click here</a> !</p>

                        <p class="text-center">
                            If you want to book your stay before 7 days, please contact us !
                        </p>
                    </div>
                </div>

                <div class="container" style="margin-top:30px;">

                    @include('flash')

                    <div id="datepicker1" style="margin:auto;"></div>

                    {{Form::open(['url'=>action('reservationController@getCheckout')])}}

                    {{Form::hidden('formule', $formule)}}

                    {{Form::hidden('lang', $lang)}}

                    <div class="col-md-6">

                        <div class="form-group col-md-6">
                            <label for="">Name</label>
                            {{Form::text('nom',null,['class'=>'form-control'])}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">First name</label>
                            {{Form::text('prenom',null,['class'=>'form-control'])}}
                        </div>

                        {{Form::hidden('jours', 0, ['class'=>'form-control jour'])}}

                        <div class="form-group col-md-12">
                            <label for="">Your actual address</label>
                            {{Form::text('adresse', null, ['class'=>'form-control'])}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Code postal</label>
                            {{Form::number('code_postal', null, ['class'=>'form-control'])}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Your town</label>
                            {{Form::text('ville', null, ['class'=>'form-control'])}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Your email</label>
                            {{Form::email('mail', null, ['class'=>'form-control'])}}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Your phone number</label>
                            {{Form::text('numero_telephone', null, ['class'=>'form-control'])}}
                        </div>

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right"
                                   title="Vous souhaitez payer votre séjour en espèce ou en chèque !">
                                {{Form::checkbox('espece')}}
                                Payment by cash
                            </label>
                        </div>

                        <div class="form-group">
                            <p class="alert alert-warning">
                                Without checking this box, you will pay your stay with Paypal !
                            </p>
                            <p class="alert alert-success">
                                By paying with with Paypal or Credit card, you will pay 50% of the total !
                            </p>
                        </div>

                            {{Form::hidden('time',null,['class'=>'form-control time'])}}

                    </div>

                    <div class="col-md-3">

                        <h3 class="text-center">Options available</h3>

                        <div class="form-group">
                            <p class="alert alert-info">Hover the option for more details !</p>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right"
                                   title="Nous anticiperons votre arrivée !">
                                {{Form::checkbox('Arrivée anticipée', 30)}}
                                Prevent your arrival
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right"
                                   title="Nous préparons votre départ tardif">
                                {{Form::checkbox('Départ tardif', 30)}}
                                Late departure
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right"
                                   title="Nous préparerons votre arrivée anticipée ainsi que votre départ tardif !">
                                {{Form::checkbox('Arrivée anticipée + Départ tardif', 50)}}
                                Prevent your arrival + late departure
                            </label>
                        </div>

                        @foreach($options as $o)

                            <div class="form-group">
                                <label for="" data-toggle="tooltip" data-placement="right" title="{{$o->infos}}">
                                    {{Form::checkbox($o->options, $o->prix)}}
                                    {{$o->options}}
                                </label>
                            </div>

                        @endforeach

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right" title="Info ménages...">
                                {{Form::checkbox('Ménage', 30)}}
                                Housework
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="" data-toggle="tooltip" data-placement="right"
                                   title="Massage de 30min pour 60€/personnes !">
                                {{Form::checkbox('Massage', 60)}}
                                Massage
                            </label>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <p>How many days ?</p>

                        <div class="form-group text-center">
                            @while($i <= 7 && $n <= 7)
                                <a class="btn btn-primary jour{{$n++}}" style="margin-bottom:10px;">{{$i++}}</a>
                            @endwhile
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <h4>When will you come ?</h4>
                            <div style="margin: 0 auto; display:inline-block">
                                <div id="datepicker"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-block btn-primary">Book my stay !</button>
                    </div>

                    {{Form::close()}}

                    @endif


                </div><!-- /.container -->

@endsection