<?php $dates = \App\dateReservations::all(['date']); ?>
        <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Urban SPA</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{url('/')}}/css/app.css">
    <link rel="stylesheet" href="{{url('/')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('/')}}/css/fullcalendar.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/daterangepicker.css">
    <link rel="stylesheet" href="{{url('/')}}/css/jquery.fullPage.css">
    <link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('/')}}/css/zoombox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body style="font-family: caviardreams;" ng-app="urbanspa">

<nav class="navbar navbar-inverse navbar-fixed-top" id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if($lang == 'fr')
                <a class="navbar-brand" href="{{url('/')}}">UrbanSPA</a>
            @else
                <a class="navbar-brand" href="{{url('/en')}}">UrbanSPA</a>
            @endif
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                @if($lang == 'fr')
                    <li data-menuanchor="prestations"><a href="{{url('/')}}/#prestations">Prestations</a></li>
                    <li data-menuanchor="photos"><a href="{{url('/')}}/#photos">Photographies</a></li>
                    <li data-menuanchor="tarifs"><a href="{{url('/')}}/#tarifs">Options & Tarifs</a></li>
                    <li data-menuanchor="troyes"><a href="{{url('/')}}/#troyes">Visiter Troyes</a></li>
                    <li data-menuanchor="contact"><a href="{{url('/')}}/#contact">Contact</a></li>
                    <li id="menu-reserver"><a href="{{url('/reservations')}}">Réserver</a></li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <li><a href="{{url('/admin')}}">Administration</a></li>
                        @endif
                @else
                    <li data-menuanchor="prestations"><a href="{{url('/en')}}#prestations">Services</a></li>
                    <li data-menuanchor="photos"><a href="{{url('/en')}}#photos">Photos</a></li>
                    <li data-menuanchor="tarifs"><a href="{{url('/en')}}#tarifs">Options & Prices</a></li>
                    <li data-menuanchor="troyes"><a href="{{url('/en')}}#troyes">Visit Troyes</a></li>
                    <li data-menuanchor="contact"><a href="{{url('/en')}}#contact">Contact</a></li>
                    <li id="menu-reserver"><a href="{{url('/en/reservations')}}">Book</a></li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <li><a href="{{url('/admin')}}">Administration</a></li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('/')}}"><img src="{{url('/img/flag_fr.png')}}" alt="" class="flag"></a></li>
                <li><a href="{{url('/en')}}"><img src="{{url('/img/flag_ang.png')}}" alt="" class="flag"></a></li>
                @if(\Illuminate\Support\Facades\Auth::guest())
                    <li><a href="{{url('/login')}}"><img src="{{url('/img/login.png')}}" alt=""></a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

@yield('content')

        <!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{url('/js/wow.js')}}"></script>
<script src="{{url('/')}}/js/jquery-ui.min.js"></script>
<script>
    var array = [@foreach($dates as $d)"{!! $d['date'] !!}",@endforeach];

    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
            return [array.indexOf(string) == -1]
        },
        onSelect: function(selectedDate){
            $('.time').val(selectedDate);
        }
    });
</script>
<script src="{{url('/')}}/js/jquery.fullPage.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<script src="{{url('/js/app.js')}}"></script>
<script src="{{url('/js/zoombox.js')}}"></script>

</body>
</html>
