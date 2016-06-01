
<img src="<?php echo $message->embed(url('/img/logogris.png')); ?>" width="300px">

<hr>

<h1>Hello {{ $prenom }} !</h1>

<hr>

<p>Thanks for choosing Urban Spa to offer a stay at Troyes !</p>
<p>Here is a summary of your order:</p>
<ul>
    <li>You choose the {{$formule}}'s one !</li>
    @if($nb > 1)
        <li>For {{$nb}} day !</li>
    @else
        <li>For {{$nb}} days !</li>
    @endif

    @foreach($options_array as $k => $a)
        <li>{{$k}}</li>
    @endforeach
</ul>

@if($type_paiement == "paypal")

    <p>You decided to pay your stay by {{$type_paiement}}, so you already pay your stay !</p>

@else

    <p>You decided to pay your stay by {{$type_paiement}}, so don't forget to pay your stay !</p>

@endif

<p>The total of your stay at Urban Spa come to {{$total}} € !</p>

<h2>Your reservation's id is {{$id}}</h2>

<h2>Below you'll get a code that allow to the person whom you offer this stay to book his own dates for a period of a year, from now on.</h2>
<h1>Here is the code: {{$code}}</h1>

Here is the link that will allow you to book your dates with the code: <a href="{{url('/en/monsejour')}}">click here</a> !

<h2>Bonne journée & à très bientôt !</h2>