
    <img src="<?php echo $message->embed(url('/img/logogris.png')); ?>" width="300px">

    <hr>

    <h1>Bonjour {{ $prenom }} !</h1>

    <hr>

    <p>Merci d'avoir choisi Urban SPA pour un séjour à Troyes à offrir !</p>
    <p>Voici un récapitulatif de votre commande:</p>
    <ul>
        <li>Vous avez choisi la formule {{$formule}} !</li>
        @if($nb > 1)
            <li>Pour une durée de {{$nb}} jours !</li>
        @else
            <li>Pour une durée de {{$nb}} jour !</li>
        @endif

        @foreach($options_array as $k => $a)
            <li>{{$k}}</li>
        @endforeach
    </ul>

    @if($type_paiement == "paypal")

        <p>Vous avez choisi un paiement par {{$type_paiement}}, vous avez donc déjà opéré au paiement de votre
            séjour !</p>

    @else

        <p>Vous avez choisi un paiement par {{$type_paiement}}, n'oubliez donc pas de payer une fois que votre
            séjour à Troyes sera terminé !</p>

    @endif

    <p>Le total de votre séjour avec Urban SPA s'élève à {{$total}} € !</p>

    <h2>Votre numéro de réservation est le {{$id}}</h2>

    <h2>Ci-dessous vous obtiendrez un code vous permettant de réserver votre séjour à Troyes
        à tout moment avec une durée de validité d'un an commençant à partir de maintenant !</h2>
    <h1>Code du bon cadeau: {{$code}}</h1>

    Pour réserver les dates de votre séjour, <a href="{{url('/monsejour')}}">Cliquez ici</a> !

    <h2>Bonne journée & à très bientôt !</h2>