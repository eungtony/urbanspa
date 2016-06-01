<?php

namespace App\Http\Controllers;

use App\Cadeau;
use App\dateReservations;
use App\Formule;
use App\Http\Requests;
use App\options_resa;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = 'fr';
        $reservations = Reservation::orderBy('debut', 'asc')->paginate(10);
        $cadeaux = Cadeau::orderBy('debut_sejour', 'asc')->paginate(5);
        $agenda = DB::table('agenda')->get();
        $formule = Formule::all();
        $now = Carbon::now();
        return view('admin.index', compact('reservations', 'agenda', 'lang', 'cadeaux', 'formule', 'now'));
    }

    public function show($id){
        $lang = 'fr';
        $res = Reservation::where('id', $id)->get();
        if($res->isEmpty()){
            return back()->with('error', 'Aucune réservation ne correspond à ce numéro de réservation');
        }else{
            $data = Reservation::where('id', $id)->with('options')->get()[0];
            return view('recherche', compact('data', 'lang'));
        }
    }

    public function destroy($id)
    {
        $code = Reservation::where('id', $id)->get()[0]->code;
        dateReservations::where('code', $code)->delete();
        Reservation::where('id', $id)->delete();
        options_resa::where('reservation_id', $id)->delete();
        return redirect(url('/admin'))->with('success','La réservation ainsi que les dates affiliées ont bien été supprimé !');
    }

        public function recherche()
    {
        $lang = 'fr';
        $id = Input::get('research');
        $res = Reservation::where('id', $id)->get();
        if($res->isEmpty()){
            return back()->with('error', 'Aucune réservation ne correspond à ce numéro de réservation');
        }else{
            $data = Reservation::where('id', $id)->get()[0];
            return view('recherche', compact('data', 'lang'));
        }

    }

}
