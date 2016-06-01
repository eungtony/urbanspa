@extends('app')

@section('content')

    <div id="fullpage">

        <div class="section" id="home">
            <img data-src="{{url('/')}}/img/logoblanc.png" alt="logo" id="logo">
            @if($lang == 'fr')
                <p class="decouvrir" data-menuanchor="prestations"><a href="#prestations"
                                                                      style="color:white;">Découvrir</a>
            @else
                <p class="decouvrir" data-menuanchor="prestations"><a href="en#prestations"
                                                                      style="color:white;">Discover</a>
                    @endif
                </p>
        </div>

        <div class="section">

            <div class="slide text-center" id="appartement">
                @if($lang == 'fr')
                    <h1>L'<span id="color_title">App</span>artement</h1>
                    <p class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta, eaque error
                        excepturi fugiat ipsum labore necessitatibus nulla officia officiis optio placeat praesentium
                        reprehenderit sint tempora tenetur ullam voluptatem voluptatibus.</p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/#prestations/1')}}">Voir les
                            prestations</a></p>
                @else
                    <h1>L'<span id="color_title">App</span>artement</h1>
                    <p class="descr">
                        Too much work. Let's burn it and say we dumped it in the sewer. I don't know what you did, Fry,
                        but once again, you screwed up! Now all the planets are gonna start cracking wise about our
                        mamas. Dr. Zoidberg, that doesn't make sense. But, okay!

                        Also Zoidberg. Tell them I hate them. It's a T. It goes "tuh". This is the worst part. The calm
                        before the battle. I'm just glad my fat, ugly mama isn't alive to see this day.
                    </p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/en#prestations/1')}}">See the
                            services</a></p>
                @endif
            </div>

            <div class="slide" id="cuisineequipee">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Cuisine équipée</h1>
                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Four</h4>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Bouilloire</h4>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Réfrigérateur</h4>

                    </div>
                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>4 plaques</h4>
                        <p>vitocéramique</p>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Grille-pain</h4>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Congélateur</h4>
                    </div>

                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Four</h4>
                        <p>micro-ondes</p>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Cafetière</h4>
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Mini-bar</h4>
                    </div>
                </div>
            </div>

            <div class="slide" id="appartement">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Espace détente</h1>
                    <div class="col-md-6">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Baignoire balnéothérapie</h4>
                        <p>2 places intégrés</p>
                    </div>
                    <div class="col-md-6">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                </div>
            </div>

            <div class="slide" id="salledebain">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Salle de bain</h1>
                    <div class="col-md-6">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>

                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                    <div class="col-md-6">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>

                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                </div>
            </div>

            <div class="slide" id="multimedia">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Multimédia & Internet</h1>
                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>

                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>

                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                    <div class="col-md-4">
                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>

                        <img data-src="{{url('/img/picto.png')}}" alt="">
                        <h4>Sauna infrarouge</h4>
                        <p>micro-ondes</p>
                    </div>
                </div>
            </div>

            <div class="slide" id="loisir">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Loisir & Divertissement</h1>
                    <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet
                        beatae cumque debitis dolorum eos, explicabo fuga incidunt libero magni nam odit, porro quod
                        reprehenderit, sed tenetur velit voluptatem!
                    </div>
                    <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet
                        beatae cumque debitis dolorum eos, explicabo fuga incidunt libero magni nam odit, porro quod
                        reprehenderit, sed tenetur velit voluptatem!
                    </div>
                </div>
            </div>

            <div class="slide" id="accessibilite">
                <div class="col-md-6"></div>
                <div class="col-md-6 txt">
                    <h1>Accessibilité</h1>
                    <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet
                        beatae cumque debitis dolorum eos, explicabo fuga incidunt libero magni nam odit, porro quod
                        reprehenderit, sed tenetur velit voluptatem!
                    </div>
                    <div class="col-md-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet
                        beatae cumque debitis dolorum eos, explicabo fuga incidunt libero magni nam odit, porro quod
                        reprehenderit, sed tenetur velit voluptatem!
                    </div>
                </div>
            </div>

        </div>

        <div class="section text-center" id="photographies" style="background: white;">
            <div class="col-md-12" id="resp_photographies">
                <a href="{{url('/img/appartement.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
                <a href="{{url('/img/bg_accueil.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
                <a href="{{url('/img/divertissement.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
                <a href="{{url('/img/multimedia.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
                <a href="{{url('/img/magasin.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
                <a href="{{url('/img/nature.jpg')}}" class="zoombox zgallery1">
                    <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb" class="tb">
                </a>
            </div>
            <div class="col-md-6" id="photographies_min" style="padding:100px;">
                <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb"
                     onclick="showImage('{{url('/img/appartement.jpg')}}')" class="tb"
                     id="{{url('/img/appartement.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/bg_accueil.jpg')}}')" class="tb"
                     id="{{url('/img/bg_accueil.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/divertissement.jpg')}}')" class="tb"
                     id="{{url('/img/divertissement.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/multimedia.jpg')}}')" class="tb"
                     id="{{url('/img/multimedia.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/magasin.jpg')}}')" class="tb" id="{{url('/img/magasin.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/nature.jpg')}}')" class="tb" id="{{url('/img/nature.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/patrimoine.jpg')}}')" class="tb"
                     id="{{url('/img/patrimoine.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/loisir.jpg')}}')" class="tb" id="{{url('/img/loisir.jpg')}}">
                <img data-src="{{url('/img/appartement_tb.jpg')}}" alt="appartement_tb"
                     onclick="showImage('{{url('/img/appartement.jpg')}}')" class="tb"
                     id="{{url('/img/appartement.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/bg_accueil.jpg')}}')" class="tb"
                     id="{{url('/img/bg_accueil.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/divertissement.jpg')}}')" class="tb"
                     id="{{url('/img/divertissement.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/multimedia.jpg')}}')" class="tb"
                     id="{{url('/img/multimedia.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/magasin.jpg')}}')" class="tb" id="{{url('/img/magasin.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/nature.jpg')}}')" class="tb" id="{{url('/img/nature.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/patrimoine.jpg')}}')" class="tb"
                     id="{{url('/img/patrimoine.jpg')}}">
                <img data-src="{{url('/img/labo_tb.jpg')}}" alt="labo_tb"
                     onclick="showImage('{{url('/img/loisir.jpg')}}')" class="tb" id="{{url('/img/loisir.jpg')}}">

            </div>
            <div class="col-md-6 txt" id="showImage"
                 style="background-image:url('{{url('/img/appartement.jpg')}}'); background-size:cover;"></div>
        </div>

        <div class="section text-center">

            <div class="slide" id="options_tarifs">
                @if($lang == 'fr')
                    <h1><span id="color_title">Op</span>tions & <span id="color_title">Ta</span>rifs</h1>
                    <p class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta, eaque error
                        excepturi fugiat ipsum labore necessitatibus nulla officia officiis optio placeat praesentium
                        reprehenderit sint tempora tenetur ullam voluptatem voluptatibus.</p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/#tarifs/1')}}">Voir les formules</a>
                    </p>
                @else
                    <h1><span id="color_title">Op</span>tions & <span id="color_title">Ta</span>rifs</h1>
                    <p class="descr">Too much work. Let's burn it and say we dumped it in the sewer. I don't know what
                        you did, Fry, but once again, you screwed up! Now all the planets are gonna start cracking wise
                        about our mamas. Dr. Zoidberg, that doesn't make sense. But, okay!

                        Also Zoidberg. Tell them I hate them. It's a T. It goes "tuh". This is the worst part. The calm
                        before the battle. I'm just glad my fat, ugly mama isn't alive to see this day.</p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/en#tarifs/1')}}">Voir les
                            formules</a></p>
                @endif
            </div>

            @if($lang == 'fr')

                @foreach($formules as $f)

                    <div class="slide"
                         style="background-image:url('{{url('/')}}/img/formules/{{$f->id}}.jpg'); background-size: 70%; background-position: left;">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 txt">
                            <div class="col-md-6 formule" style="margin-top:80px;">
                                <h3>Formule</h3>
                                <h2>{{$f->titre_formule}}</h2>
                                <hr>
                                A partir de {{$f->prix}}€ la nuit
                                <hr>
                                {!! $f->description !!}

                                <hr>

                                <a href="{{url('/reservations/'.$f->titre_formule)}}"
                                   class="btn btn-primary">Réserver</a>
                            </div>
                            <div class="col-md-6" style="margin-top:80px;">

                                <h2>Options disponibles avec cette formule:</h2>

                                <ul>
                                    @foreach($f->options as $o)
                                        <li><h4>{{$o->options}} ({{$o->prix}}€)</h4></li>
                                        <p>{{$o->infos}}</p>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>


                @endforeach

            @else

                @foreach($formules as $f)

                    <div class="slide"
                         style="background-image:url('{{url('/')}}/img/formules/{{$f->id}}.jpg'); background-size: 70%; background-position: left;">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 txt">
                            <div class="col-md-6 formule" style="margin-top:80px;">
                                <h3>Formule</h3>
                                <h2>{{$f->titre_formule_ang}}</h2>
                                <hr>
                                from {{$f->prix}}€ per night
                                <hr>
                                {!! $f->description_ang !!}
                                <hr>

                                <a href="{{url('/en/reservations/'.$f->titre_formule)}}"
                                   class="btn btn-primary">Book</a>
                            </div>
                            <div class="col-md-6" style="margin-top:80px;">

                                <h2>Options available:</h2>

                                <ul>
                                    @foreach($f->options as $o)
                                        <li><h4>{{$o->option_ang}} ({{$o->prix}}€)</h4></li>
                                        <p>{!! $o->infos_ang !!}</p>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                @endforeach

            @endif


        </div>

        <div class="section text-center">
            <div class="slide" id="visiter_troyes">
                @if($lang == 'fr')
                    <h1><span id="color_title">Vis</span>iter <span id="color_title">Troy</span>es</h1>
                    <p class="descr">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta, eaque error
                        excepturi fugiat ipsum labore necessitatibus nulla officia officiis optio placeat praesentium
                        reprehenderit sint tempora tenetur ullam voluptatem voluptatibus.</p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/#troyes/1')}}">Préparer ma
                            visite</a>
                    </p>
                @else
                    <h1><span id="color_title">Vis</span>iter <span id="color_title">Troy</span>es</h1>
                    <p class="descr">Too much work. Let's burn it and say we dumped it in the sewer. I don't know what
                        you did, Fry, but once again, you screwed up! Now all the planets are gonna start cracking wise
                        about our mamas. Dr. Zoidberg, that doesn't make sense. But, okay!

                        Also Zoidberg. Tell them I hate them. It's a T. It goes "tuh". This is the worst part. The calm
                        before the battle. I'm just glad my fat, ugly mama isn't alive to see this day.</p>
                    <p class="decouvrir" style="margin-top:100px;"><a href="{{url('/en#troyes/1')}}">Prepare my
                            visit</a>
                    </p>
                @endif
            </div>
            <div class="slide" id="vignoble">
                <div class="col-md-4"></div>
                <div class="col-md-8 txt">
                    @if($lang == 'fr')
                        <h1>Vignoble de champagne</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>

                    @else

                        <h1>Wine-growing region</h1>
                        <p>No. We're on the top. So I really am important? How I feel when I'm drunk is correct? I love
                            this planet! I've got wealth, fame, and access to the depths of sleaze that those things
                            bring. Bender, we're trying our best.</p>
                        <p>Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what
                            would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
                            Cruel though they may be… Well, let's just dump it in the sewer and say we delivered it.</p>
                        <p>Ah, computer dating. It's like pimping, but you rarely have to use the phrase "upside your
                            head." Oh sure! Blame the wizards! And remember, don't do anything that affects anything,
                            unless it turns out you were supposed to, in which case, for the love of God, don't not do
                            it!</p>

                    @endif

                </div>
            </div>
            <div class="slide" id="patrimoine">
                <div class="col-md-4"></div>
                <div class="col-md-8 txt">
                    @if($lang == 'fr')
                        <h1>Culture & patrimoine</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>

                    @else

                        <h1>Culture & heritage</h1>
                        <p>No. We're on the top. So I really am important? How I feel when I'm drunk is correct? I love
                            this planet! I've got wealth, fame, and access to the depths of sleaze that those things
                            bring. Bender, we're trying our best.</p>
                        <p>Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what
                            would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
                            Cruel though they may be… Well, let's just dump it in the sewer and say we delivered it.</p>
                        <p>Ah, computer dating. It's like pimping, but you rarely have to use the phrase "upside your
                            head." Oh sure! Blame the wizards! And remember, don't do anything that affects anything,
                            unless it turns out you were supposed to, in which case, for the love of God, don't not do
                            it!</p>

                    @endif

                </div>
            </div>
            <div class="slide" id="magasin">
                <div class="col-md-4"></div>
                <div class="col-md-8 txt">
                    @if($lang == 'fr')
                        <h1>Magasin d'usine</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>

                    @else

                        <h1>"Magasin d'usine"</h1>
                        <p>No. We're on the top. So I really am important? How I feel when I'm drunk is correct? I love
                            this planet! I've got wealth, fame, and access to the depths of sleaze that those things
                            bring. Bender, we're trying our best.</p>
                        <p>Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what
                            would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
                            Cruel though they may be… Well, let's just dump it in the sewer and say we delivered it.</p>
                        <p>Ah, computer dating. It's like pimping, but you rarely have to use the phrase "upside your
                            head." Oh sure! Blame the wizards! And remember, don't do anything that affects anything,
                            unless it turns out you were supposed to, in which case, for the love of God, don't not do
                            it!</p>

                    @endif

                </div>
            </div>
            <div class="slide" id="nature">
                <div class="col-md-4"></div>
                <div class="col-md-8 txt">
                    @if($lang == 'fr')
                        <h1>Nature & environnement</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>

                    @else

                        <h1>Nature & environment</h1>
                        <p>No. We're on the top. So I really am important? How I feel when I'm drunk is correct? I love
                            this planet! I've got wealth, fame, and access to the depths of sleaze that those things
                            bring. Bender, we're trying our best.</p>
                        <p>Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what
                            would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
                            Cruel though they may be… Well, let's just dump it in the sewer and say we delivered it.</p>
                        <p>Ah, computer dating. It's like pimping, but you rarely have to use the phrase "upside your
                            head." Oh sure! Blame the wizards! And remember, don't do anything that affects anything,
                            unless it turns out you were supposed to, in which case, for the love of God, don't not do
                            it!</p>

                    @endif

                </div>
            </div>
            <div class="slide" id="divertissement">
                <div class="col-md-4"></div>
                <div class="col-md-8 txt">
                    @if($lang == 'fr')
                        <h1>Divertissement</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid est ipsa magnam similique
                            tenetur totam. Ad aut eius et fugit laudantium, natus odit omnis, placeat quidem saepe
                            sequi,
                            tempore veniam?</p>

                    @else

                        <h1>Entertainment</h1>
                        <p>No. We're on the top. So I really am important? How I feel when I'm drunk is correct? I love
                            this planet! I've got wealth, fame, and access to the depths of sleaze that those things
                            bring. Bender, we're trying our best.</p>
                        <p>Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what
                            would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords.
                            Cruel though they may be… Well, let's just dump it in the sewer and say we delivered it.</p>
                        <p>Ah, computer dating. It's like pimping, but you rarely have to use the phrase "upside your
                            head." Oh sure! Blame the wizards! And remember, don't do anything that affects anything,
                            unless it turns out you were supposed to, in which case, for the love of God, don't not do
                            it!</p>

                    @endif

                </div>
            </div>
            <div class="slide" id="agenda">
                <div class="col-md-6 txt">

                    @if($lang =='fr')

                        @foreach($agenda as $a)

                            @if($a->id == $mois)
                                <div id="month_{{$a->id}}" style="display: block; margin-top:100px;">
                                    <h2>Evènements du mois de {{$a->mois}}</h2>
                                    {!! $a->contenu !!}
                                </div>
                            @else
                                <div id="month_{{$a->id}}" style="display: none; margin-top:100px;">
                                    <h2>Evènements du mois de {{$a->mois}}</h2>
                                    {!! $a->contenu !!}
                                </div>
                            @endif

                        @endforeach

                    @else

                        @foreach($agenda as $a)

                            @if($a->id == $mois)
                                <div id="month_{{$a->id}}" style="display: block; margin-top:100px;">
                                    <h2>Events on {{$a->mois}}</h2>
                                    {!! $a->contenu !!}
                                </div>
                            @else
                                <div id="month_{{$a->id}}" style="display: none; margin-top:100px;">
                                    <h2>Events on {{$a->mois}}</h2>
                                    {!! $a->contenu !!}
                                </div>
                            @endif

                        @endforeach

                    @endif

                </div>
                <div class="col-md-6 txt agenda">

                    <h1>Agenda Troyes</h1>

                    @foreach($agenda as $a)

                        <a href="#" rel="month_{{$a->id}}" class="btn btn-primary">{{$a->id}}</a>

                    @endforeach


                </div>
            </div>
        </div>

        <div class="section" id="plans">
            <div class="visible-lg" style="height:66%; padding-top:60px;" id="google_maps">
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42472.69311220539!2d4.041101122376281!3d48.29240108430802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ee9857e787b7b1%3A0x57dd125566e84f75!2sTroyes!5e0!3m2!1sfr!2sfr!4v1463501947241"
                            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1343752.4285699823!2d3.516325978842449!3d48.867430292135914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e974ff467ea75d%3A0x9abff6786592ab3d!2sChampagne-Ardenne!5e0!3m2!1sfr!2sfr!4v1463502113876"
                            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-md-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2736702.1905283737!2d1.8718162841483728!3d47.94488002102927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ee9857e787b7b1%3A0x57dd125566e84f75!2sTroyes!5e0!3m2!1sfr!2sfr!4v1463502197334"
                            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-12 div-contact" style="height:25%;">
                <div class="col-md-3 text-center">
                    <h1><span id="color_title">Con</span>tact</h1>
                </div>

                <div class="col-md-2 social_medias">
                    <a href="">
                        <img src="{{url('/img/facebook.png')}}" alt="" style="width:55px;">
                    </a>
                    <a href="">
                        <img src="{{url('/img/twitter.png')}}" alt="" style="width:55px;">
                    </a>
                    <a href="">
                        <img src="{{url('/img/google.png')}}" alt="" style="width:55px;">
                    </a>
                </div>
                <div class="col-md-4 numero_mail" style="margin-top:-30px;">
                    <h2>06.00.00.00.00</h2>
                    <h3>urbanspatroyes@gmail.com</h3>
                </div>

                <div class="col-md-3 text-center" id="reserver">
                    @if($lang =='fr')
                        <a href="{{url('/reservations')}}">Réserver</a>
                    @else
                        <a href="{{url('/en/reservations')}}">Book</a>
                    @endif
                </div>
            </div>

            <div class="col-md-12 text-center" id="footer">
                <a href="">Copyrights</a> -
                <a href="">Mentions légales</a>
                <img data-src="{{url('/img/meuble.png')}}" alt="">
                <a href="">CGU</a> -
                <a href="">Règlement intérieur</a>
            </div>
        </div>

    </div>

@endsection