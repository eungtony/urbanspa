<div class="text-center">

    <hr>

    <h1>Hello {{ $prenom }} !</h1>

    <hr>

    <p>Thanks for choosing Urban SPA for your stay at Troyes !</p>
    <p>Here is a summary of your order !</p>
    <ul>
        <li>You choose the {{$formule}} one !</li>
        @if($nb > 1)
            <li>For {{$nb}} days !</li>
        @else
            <li>For {{$nb}} day !</li>
        @endif

        @foreach($options_array as $k => $a)
            <li>{{$k}}</li>
        @endforeach
    </ul>

    @if($type_paiement == "paypal")

        <p>You choose to pay your stay by {{$type_paiement}}, so you already payed it !</p>

    @else

        <p>You choose to pay your stay by {{$type_paiement}}, so don't forget to pay your stay at the end of your trip !</p>

    @endif

    <h2>Your reservation's id is {{$id}}</h2>

    <p>The total of your stay at Urban Spa come to {{$total}} € !</p>

    <h2>Have a nice day & see you soon !</h2>


</div>