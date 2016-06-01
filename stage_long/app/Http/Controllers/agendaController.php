<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class agendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id){
        $lang = 'fr';
        $agenda = DB::table('agenda')->where('id', $id)->get()[0];
        return view ('admin.agenda.agenda', compact('agenda', 'lang'));
    }

    public function update($id, Request $request){
        $data = $request->only(['contenu']);
        DB::table('agenda')->where('id', $id)->update($data);
        return back()->with('success', 'La modification a été un succès !');
    }
}
