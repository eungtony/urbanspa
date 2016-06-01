<?php

namespace App\Http\Controllers;

use App\Cadeau;
use App\dateReservations;
use App\Formule;
use App\Option;
use App\options_resa;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Netshell\Paypal\Facades\Paypal;
use PayPal\Api\Details;

class reservationController extends Controller
{

    private $_apiContext;

    public function __construct(Mailer $mailer)
    {
        $this->_apiContext = Paypal::ApiContext(config('services.paypal.client_id'), config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'DEBUG',
            'cache.enabled' => true,
        ));

        $this->mailer = $mailer;
    }


    //FR

    public function home()
    {
        $formules = \App\Formule::with('options')->online()->get();
        $agenda = \Illuminate\Support\Facades\DB::table('agenda')->get();
        $today = date("m.d.y");
        $date_explosee = explode(".", $today);
        $mois = $date_explosee[0];
        $lang = 'fr';
        return view('welcome', compact('formules', 'agenda', 'mois', 'lang'));
    }

    public function index()
    {
        $lang = 'fr';
        $formules = \App\Formule::with('options')->online()->get();
        return view('reservation.list', compact('lang', 'formules'));
    }

    public function show($formule)
    {
        $lang = 'fr';
        $i = 1;
        $n = 1;
        $formules = Formule::online()->get();
        foreach ($formules as $f) {
            if ($formule == $f->titre_formule) {
                $options = Option::where('formule_id', $f->id)->get();
                $id_formule = Formule::where('titre_formule', $formule)->get()[0]->id;
                return view('reservation.index', compact('formule', 'options', 'lang', 'i', 'n', 'id_formule'));
            }
        }

        if ($formule != $f->titre_formule) {
            return redirect(url('/reservations'));
        }

    }

    public function cadeau($formule)
    {
        $lang = 'fr';
        $i = 1;
        $n = 1;
        $formules = Formule::all();
        foreach ($formules as $f) {
            if ($formule == $f->titre_formule) {
                $options = Option::where('formule_id', $f->id)->get();
                return view('cadeau.index', compact('formule', 'options', 'lang', 'i', 'n'));
            }
        }
    }

    //ANG

    public function english()
    {
        $formules = \App\Formule::online()->with('options')->get();
        $agenda = \Illuminate\Support\Facades\DB::table('agenda')->get();
        $today = date("m.d.y");
        $date_explosee = explode(".", $today);
        $mois = $date_explosee[0];
        $lang = 'en';
        return view('welcome', compact('formules', 'agenda', 'mois', 'lang'));
    }

    public function listEng()
    {
        $lang = 'en';
        $formules = \App\Formule::online()->with('options')->get();
        return view('reservation.list', compact('lang', 'formules'));
    }

    public function formEng($formule)
    {
        $lang = 'en';
        $i = 1;
        $n = 1;
        $formules = Formule::online()->get();
        foreach ($formules as $f) {
            if ($formule == $f->titre_formule) {
                $options = Option::where('formule_id', $f->id)->get();
                $id_formule = Formule::where('titre_formule', $formule)->get()[0]->id;
                return view('reservation.index', compact('formule', 'options', 'lang', 'i', 'n', 'id_formule'));
            }
        }
    }

    public function cadeauAng($formule)
    {
        $lang = 'en';
        $i = 1;
        $n = 1;
        $formules = Formule::online()->get();
        foreach ($formules as $f) {
            if ($formule == $f->titre_formule) {
                $options = Option::where('formule_id', $f->id)->get();
                return view('cadeau.index', compact('formule', 'options', 'lang', 'i', 'n'));
            }
        }
    }

    /*PAYPAL*/

    public function getCheckout(Requests\reservationRequest $request)
    {
        $i = 0;

        $form = 'trad';

        $code = str_random(5);

        $lang = $request->input('lang');

        while ($i < 7) {

            $now = Carbon::now()->addDays($i++)->format('Y-m-d');
            if ($request->input('time') == $now) {
                return back()->with('error', 'Pour réserver dans la semaine, veuillez bien nous contacter !');
            }

        }

        $espece = $request->input('espece');

        if ($espece == 1) {

            /*L'UTILISATEUR REALISE LE PAIEMENT PAR ESPECE OU CHEQUE*/

            $options_array = $request->except(
                ['nom', 'prenom', 'jours', 'time', '_token', 'formule', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville', 'espece', 'lang']);
            $formule = $request->input('formule');
            if ($formule == 'base') {
                $prix = 180;
            } else {
                $prix = 230;
            }
            if ($lang == 'fr') {
                $type_paiement = "espece";
            } else {
                $type_paiement = "cash";
            }
            $start = $request->input('time');
            $nb = $request->input('jours');
            $mail = $request->input('mail');
            if ($nb > 7) {
                return back()->with('error', 'Pour toute réservation de 7 jours, contactez-nous !');
            }
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $end = Carbon::createFromFormat('Y-m-d', $start)->addDays($nb)->format('Y-m-d');
            $i = 0;

            $total = $prix * $nb + collect($options_array)->sum();

            if ($nb == 1) {
                $dates = new dateReservations();
                $dates->date = $start;
                $dates->code = $code;
                $dates->save();
            } else {
                while ($i < $nb) {
                    $date = Carbon::createFromFormat('Y-m-d', $start)->addDays($i++)->format('Y-m-d');
                    $test = dateReservations::where('date', $date)->get();
                    $dates = new dateReservations();
                    $dates->date = $date;
                    $dates->code = $code;
                    if ($test->isEmpty()) {
                        $dates->save();
                    } else {
                        dateReservations::where('code', $code)->delete();
                        return back()->with('error', 'Vous ne pouvez pas réserver à ces dates !');
                    }

                }
            }

            $reservation = $request->only(['nom', 'prenom', 'jours', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville']);
            $reservation['debut'] = $start;
            $reservation['fin'] = $end;
            $reservation['formule'] = $formule;
            $reservation['prix_total'] = $total;
            $reservation['type_paiement'] = 'espece';
            $reservation['code'] = $code;
            Reservation::create($reservation);

            $id = Reservation::where('code', $code)->get()[0]->id;

            foreach ($options_array as $k => $o) {
                options_resa::create(['nom_option' => $k, 'reservation_id' => $id, 'cadeau_id' => 0]);
            }

            if ($lang == 'fr') {

                $this->mailer->send('auth.emails.mail', compact('id', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'cadeau', 'code'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Récaputilatif de votre réservation chez Urban Spa');
                });

                return back()->with('success', 'Votre réservation a bien été enregistré ! Un mail vous a été envoyé pour vous rappeler les détails de votre commande !');


            } else {

                $this->mailer->send('auth.emails.mail_en', compact('id', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'cadeau', 'code'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Summary of your booking at Urban Spa');
                });

                return back()->with('success', 'Your booking has been register ! An email has been sent to remind you of the details of your booking !');

            }


        } else {

            /*L'UTILISATEUR REALISE LE PAIEMENT AVEC PAYPAL*/

            $options_array = $request->except(
                ['nom', 'prenom', 'jours', 'time', '_token', 'formule', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville', 'lang']);
            $formule = $request->input('formule');
            if ($formule == 'base') {
                $prix = 180;
            } else {
                $prix = 230;
            }
            $start = $request->input('time');
            $nb = $request->input('jours');
            if ($nb > 7) {
                return back()->with('error', 'Pour toute réservation de 7 jours, contactez-nous !');
            }
            $type_paiement = "paypal";
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $end = Carbon::createFromFormat('Y-m-d', $start)->addDays($nb)->format('Y-m-d');
            $i = 0;

            /*PAIEMENT PAR PAYPAL REDIRECTION*/

            $payer = PayPal::Payer();
            $payer->setPaymentMethod('paypal');

            $items = [];
            $index = 0;
            $items[0] = Paypal::Item()->setName('Formule ' . $formule)->setCurrency('EUR')->setQuantity($nb)->setPrice($prix / 2);
            foreach ($options_array as $k => $_item) {
                $index++;
                $items[$index] = Paypal::Item();
                $items[$index]->setName($k)
                    ->setCurrency('EUR')
                    ->setQuantity(1)
                    ->setPrice($_item / 2);
            }

            $price = [];

            foreach ($options_array as $k => $a) {
                $index++;
                $price[$index] = $a / 2;
            }

            $price[1] = $prix / 2 * $nb;

            $total = collect($price)->sum();

            $itemList = Paypal::ItemList();
            $itemList->setItems($items);

            $amount = PayPal::Amount();
            $amount->setCurrency('EUR');
            $amount->setTotal($total);

            $transaction = PayPal::Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription('Votre commande sur urbanspa');
            $transaction->setItemList($itemList);


            $redirectUrls = PayPal:: RedirectUrls();
            $redirectUrls->setReturnUrl(action('reservationController@getDone', compact('code', 'form')));
            $redirectUrls->setCancelUrl(action('reservationController@getCancel', compact('code', 'form')));

            $payment = PayPal::Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);
            $redirectUrl = $response->links[1]->href;

            if ($nb == 1) {
                $dates = new dateReservations();
                $dates->date = $start;
                $dates->code = $code;
                $dates->save();
            } else {
                while ($i < $nb) {
                    $date = Carbon::createFromFormat('Y-m-d', $start)->addDays($i++)->format('Y-m-d');
                    $dispo = dateReservations::where('date', $date)->get();
                    if ($dispo->isEmpty()) {
                        $dates = new dateReservations();
                        $dates->date = $date;
                        $dates->code = $code;
                        $dates->save();

                    } else {
                        dateReservations::where('code', $code)->delete();
                        return back()->with('error', 'Vous ne pouvez pas réserver à ces dates !');
                    }

                }

            }

            $reservation = $request->only(['nom', 'prenom', 'jours', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville']);
            $reservation['debut'] = $start;
            $reservation['fin'] = $end;
            $reservation['formule'] = $formule;
            $reservation['prix_total'] = $total;
            $reservation['type_paiement'] = 'paypal';
            $reservation['code'] = $code;
            Reservation::create($reservation);

            $id = Reservation::where('code', $code)->get()[0]->id;

            foreach ($options_array as $k => $o) {
                options_resa::create(['nom_option' => $k, 'reservation_id' => $id, 'cadeau_id' => 0]);
            }

            if ($lang == 'fr') {

                $this->mailer->send('auth.emails.mail', compact('id', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Récaputilatif de votre réservation chez Urban Spa');
                });


            } else {

                $this->mailer->send('auth.emails.mail_en', compact('id', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Summary of your booking at Urban Spa');
                });

            }

            return Redirect::to($redirectUrl);

        }


    }

    public function cadeauGetCheckout(Requests\cadeauRequest $request)
    {
        $i = 0;

        $form = 'cadeau';

        $code = str_random(5);

        $lang = $request->input('lang');

        $espece = $request->input('espece');

        $debut = Carbon::now();

        $fin_cadeau = $date = Carbon::now()->addYear()->format('Y-m-d');

        if ($espece == 1) {

            /*L'UTILISATEUR REALISE LE PAIEMENT PAR ESPECE OU CHEQUE*/

            $options_array = $request->except(
                ['nom', 'prenom', '_token', 'jours', 'formule', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville', 'espece', 'lang']);
            $formule = $request->input('formule');
            if ($formule == 'base') {
                $prix = 180;
            } else {
                $prix = 230;
            }
            if ($lang == 'fr') {
                $type_paiement = "espece";
            } else {
                $type_paiement = "cash";
            }
            $nb = $request->input('jours');
            $mail = $request->input('mail');
            $nom = $request->input('nom');
            $prenom = $request->input('prenom');
            $i = 0;

            $total = $prix * $nb + collect($options_array)->sum();

            $reservation = $request->only(['nom', 'prenom', 'jours', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville']);
            $reservation['formule'] = $formule;
            $reservation['prix_total'] = $total;
            $reservation['type_paiement'] = 'espece';
            $reservation['code'] = $code;
            $reservation['fin_cadeau'] = $fin_cadeau;
            $reservation['debut'] = $debut;
            Cadeau::create($reservation);

            $id = Cadeau::where('code', $code)->get()[0]->id;

            foreach ($options_array as $k => $o) {
                options_resa::create(['nom_option' => $k, 'cadeau_id' => $id, 'reservation_id' => 0]);
            }

            if ($lang == 'fr') {

                $this->mailer->send('auth.emails.cadeau', compact('id', 'code', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'cadeau', 'code'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Récaputilatif de votre réservation chez Urban Spa');
                });

                return back()->with('success', 'Votre réservation a bien été enregistré ! Un mail vous a été envoyé pour vous rappeler les détails de votre commande !');


            } else {

                $this->mailer->send('auth.emails.cadeau_en', compact('id', 'code', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'cadeau', 'code'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Summary of your booking at Urban Spa');
                });

                return back()->with('success', 'Your booking has been register ! An email has been sent to remind you of the details of your booking !');

            }


        } else {

            /*L'UTILISATEUR REALISE LE PAIEMENT AVEC PAYPAL*/

            $options_array = $request->except(
                ['nom', 'prenom', '_token', 'jours', 'formule', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville', 'lang']);
            $formule = $request->input('formule');
            if ($formule == 'base') {
                $prix = 180;
            } else {
                $prix = 230;
            }
            $type_paiement = "paypal";
            $nom = $request->input('nom');
            $nb = $request->input('jours');
            $prenom = $request->input('prenom');
            $i = 0;

            /*PAIEMENT PAR PAYPAL REDIRECTION*/

            $payer = PayPal::Payer();
            $payer->setPaymentMethod('paypal');

            $items = [];
            $index = 0;
            $items[0] = Paypal::Item()->setName('Formule ' . $formule)->setCurrency('EUR')->setQuantity($nb)->setPrice($prix);
            foreach ($options_array as $k => $_item) {
                $index++;
                $items[$index] = Paypal::Item();
                $items[$index]->setName($k)
                    ->setCurrency('EUR')
                    ->setQuantity(1)
                    ->setPrice($_item);
            }

            $price = [];

            foreach ($options_array as $k => $a) {
                $index++;
                $price[$index] = $a;
            }

            $price[1] = $prix * $nb;

            $total = collect($price)->sum();

            $itemList = Paypal::ItemList();
            $itemList->setItems($items);

            $amount = PayPal::Amount();
            $amount->setCurrency('EUR');
            $amount->setTotal($total);

            $transaction = PayPal::Transaction();
            $transaction->setAmount($amount);
            $transaction->setDescription('Votre commande sur urbanspa');
            $transaction->setItemList($itemList);


            $redirectUrls = PayPal:: RedirectUrls();
            $redirectUrls->setReturnUrl(action('reservationController@getDone', compact('code', 'form')));
            $redirectUrls->setCancelUrl(action('reservationController@getCancel', compact('code', 'form')));

            $payment = PayPal::Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            $response = $payment->create($this->_apiContext);
            $redirectUrl = $response->links[1]->href;

            $reservation = $request->only(['nom', 'prenom', 'jours', 'adresse', 'code_postal', 'mail', 'numero_telephone', 'ville']);
            $reservation['formule'] = $formule;
            $reservation['prix_total'] = $total;
            $reservation['type_paiement'] = 'paypal';
            $reservation['code'] = $code;
            $reservation['fin_cadeau'] = $fin_cadeau;
            $reservation['debut'] = $debut;
            Cadeau::create($reservation);

            $id = Cadeau::where('code', $code)->get()[0]->id;

            foreach ($options_array as $k => $o) {
                options_resa::create(['nom_option' => $k, 'cadeau_id' => $id, 'reservation_id' => 0]);
            }

            if ($lang == 'fr') {
                $this->mailer->send('auth.emails.cadeau', compact('id', 'code', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'code', 'cadeau'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Récaputilatif de votre réservation chez Urban Spa');
                });
            } else {
                $this->mailer->send('auth.emails.cadeau_en', compact('id', 'code', 'total', 'nb', 'type_paiement', 'options_array', 'prenom', 'formule', 'code', 'cadeau'), function ($message) use ($request) {
                    $message->to($request->input('mail'))->subject('Récaputilatif de votre réservation chez Urban Spa');
                });
            }

            return Redirect::to($redirectUrl);

        }


    }


    public function getDone($code, $form, Request $request)
    {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');

        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        if ($form == 'trad') {
            $formule = Reservation::where('code', $code)->get()[0]->formule;

            $res = Reservation::where('code', $code)
                ->where('paye', 0)
                ->update(['paye' => 1, 'transaction_id' => $id, 'payer_id' => $payer_id, 'token' => $token]);

            return redirect(url('/reservations/' . $formule))->with('success', 'Votre réservation a bien été enregistré et votre paiement a bien été reçu !');
        } else {
            $formule = Cadeau::where('code', $code)->get()[0]->formule;

            $res = Cadeau::where('code', $code)
                ->where('paye', 0)
                ->update(['paye' => 1, 'transaction_id' => $id, 'payer_id' => $payer_id, 'token' => $token]);

            return redirect(url('/reservations/' . $formule))->with('success', 'Votre réservation a bien été enregistré et votre paiement a bien été reçu !');
        }
    }

    public function getCancel($code, $form)
    {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        if($form == 'trad'){
            $res = Reservation::where('code', $code)->get()[0];
            $formule = $res->formule;
            Reservation::where('code', $code)->delete();
            dateReservations::where('code', $code)->delete();
            return redirect(url('/reservations/' . $formule))->with('error', 'Vous avez décidé d\'annuler le paiement, nous avons supprimé votre réservation !');
        }else{
            $res = Cadeau::where('code', $code)->get()[0];
            $formule = $res->formule;
            Cadeau::where('code', $code)->delete();
            dateReservations::where('code', $code)->delete();
            return redirect(url('/reservations/' . $formule))->with('error', 'Vous avez décidé d\'annuler le paiement, nous avons supprimé votre réservation !');
        }
    }

    public function store(Request $request){

    }

    public function update($id)
    {
        Reservation::where('id', $id)->update(['paye' => 1]);
        return back()->with('success', 'Le paiement de cette réservation a été effectué !');
    }

    //FR

    public function codeForm()
    {
        $lang = 'fr';
        return view('reservation.code', compact('lang'));
    }

    public function checkCode(Request $request)
    {
        $code = $request->input('code');
        $res = Cadeau::where('code', $code)->get();
        if ($res->isEmpty()) {
            return back()->with('error', 'Désolé nous n\'avons pas trouvé de réservation correspondant à ce code cadeau');
        } else {
            $now = Carbon::now();
            $debut = Carbon::createFromFormat('Y-m-d', $res[0]->debut);
            $fin = Carbon::createFromFormat('Y-m-d', $res[0]->fin_cadeau);
            $check = $now->between($debut, $fin);
            $date_done = $res[0]->date_done;
            if ($check == true AND $date_done == 0) {
                $lang = 'fr';
                $jours = $res[0]->jours;
                $code = $res[0]->code;
                return view('reservation.check', compact('jours', 'lang', 'code'));
            } else {
                return back()->with('error', 'Désolé votre code cadeau n\'est plus valide ou vous avez déjà effectué votre réservation avec ce bon cadeau !');
            }

        }
    }

    public function cadeauRes(Request $request)
    {
        $nb = $request->input('jours');
        $code = $request->input('code');
        $res = Cadeau::where('code', $code)->get()[0];
        $formule = $res->formule;
        $start = $request->input('time');
        $end = Carbon::createFromFormat('Y-m-d', $start)->addDays($nb)->format('Y-m-d');
        $i = 0;


        while ($i < $nb) {
            $date = Carbon::createFromFormat('Y-m-d', $start)->addDays($i++)->format('Y-m-d');
            $test = dateReservations::where('date', $date)->get();
            if ($test->isEmpty()) {
                $dates = new dateReservations();
                $dates->date = $date;
                $dates->code = $code;
                $dates->save();
            } else {
                dateReservations::where('code', $code)->delete();
                return redirect(url('/monsejour'))->with('error', 'Vous ne pouvez pas réserver à ces dates !');
            }

        }

        Cadeau::where('code', $code)->update(['date_done' => 1, 'debut_sejour' => $start, 'fin_sejour' => $end]);

        return redirect(url('/cadeau/' . $formule))->with('success', 'Votre réservation a bien été prise en compte !');
    }

    //ANG

    public function ang_codeForm()
    {
        $lang = 'en';
        return view('reservation.ang_code', compact('lang'));
    }

    public function ang_checkCode(Request $request)
    {
        $code = $request->input('code');
        $res = Cadeau::where('code', $code)->get();
        if ($res->isEmpty()) {
            return back()->with('error', 'Sorry we didn\' didn\'t find a reservation associated with your code !');
        } else {
            $now = Carbon::now();
            $debut = Carbon::createFromFormat('Y-m-d', $res[0]->debut);
            $fin = Carbon::createFromFormat('Y-m-d', $res[0]->fin_cadeau);
            $check = $now->between($debut, $fin);
            $date_done = $res[0]->date_done;
            if ($check == true AND $date_done == 0) {
                $lang = 'en';
                $jours = $res[0]->jours;
                $code = $res[0]->code;
                return view('reservation.ang_check', compact('jours', 'lang', 'code'));
            } else {
                return back()->with('error', "Sorry this code is no more valid or you already book your dates for this code !");
            }

        }
    }

    public function ang_cadeauRes(Request $request)
    {
        $nb = $request->input('jours');
        $code = $request->input('code');
        $res = Cadeau::where('code', $code)->get()[0];
        $formule = $res->formule;
        $start = $request->input('time');
        $end = Carbon::createFromFormat('Y-m-d', $start)->addDays($nb)->format('Y-m-d');
        $i = 0;


        while ($i < $nb) {
            $date = Carbon::createFromFormat('Y-m-d', $start)->addDays($i++)->format('Y-m-d');
            $test = dateReservations::where('date', $date)->get();
            if ($test->isEmpty()) {
                $dates = new dateReservations();
                $dates->date = $date;
                $dates->code = $code;
                $dates->save();
            } else {
                dateReservations::where('code', $code)->delete();
                return redirect(url('/en/monsejour'))->with('error', 'You can\'t book your stay at these dates !');
            }

        }

        Cadeau::where('code', $code)->update(['date_done' => 1, 'debut_sejour' => $start, 'fin_sejour' => $end]);

        return redirect(url('/en/cadeau/' . $formule))->with('success', 'You book has been registered !');
    }

}
