<?php

namespace App\Http\Controllers;

use App\Cadeau;
use App\dateReservations;
use App\options_resa;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class cadeauController extends Controller
{

    public function index(){
        $lang = 'fr';
        $id = Input::get('research');
        $res = Cadeau::where('id', $id)->get();
        if($res->isEmpty()){
            return back()->with('error', 'Aucune réservation ne correspond à ce numéro de réservation');
        }else{
            $data = Cadeau::where('id', $id)->with('options')->get()[0];
            dd($data);
            return view('recherchebc', compact('data', 'lang'));
        }
    }

    public function show($id){
        $lang = 'fr';
        $res = Cadeau::where('id', $id)->get();
        if($res->isEmpty()){
            return back()->with('error', 'Aucune réservation ne correspond à ce numéro de réservation');
        }else{
            $data = Cadeau::where('id', $id)->with('options')->get()[0];
            return view('recherchebc', compact('data', 'lang'));
        }
    }

    public function update($id){
        Cadeau::where('id', $id)->update(['paye' => 1]);
        return back()->with('success', 'Le paiement de cette réservation a été effectué !');
    }

    public function destroy($id){
        $code = Cadeau::where('id', $id)->get()[0]->code;
        dateReservations::where('code', $code)->delete();
        Cadeau::where('id', $id)->delete();
        options_resa::where('cadeau_id', $id)->delete();
        return redirect(url('/admin'))->with('success','La réservation ainsi que les dates affiliées ont bien été supprimé !');
    }
}
