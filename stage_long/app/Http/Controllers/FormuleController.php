<?php

namespace App\Http\Controllers;

use App\Formule;
use App\Option;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic;

class FormuleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $lang = 'fr';
        return view('reservation.formule', compact('lang'));
    }

    public function edit($formule){
        $lang = 'fr';
        $formule = Formule::findOrFail($formule);
        return view('admin.formules', compact('formule', 'lang'));
    }

    public function store(Request $request){

        $data = $request->except(['_token']);
        $formule = Formule::create($data);
        $id = $formule->id;
        if($request->hasFile('image') AND $request->file('image')->isValid()){
            ImageManagerStatic::make($request->file('image'))->save(public_path()."/img/formules/$id.jpg");
        }
        return redirect(url('/admin'))->with('success', 'La formule a été ajouté avec succès !');

    }

    public function update($formules, Request $request){
        $data = $request->only(['description', 'description_ang', 'prix', 'online', 'titre_formule', 'titre_formule_ang']);
        Formule::findOrFail($formules)->update($data);
        if($request->hasFile('image') AND $request->file('image')->isValid()){
            $id = Formule::findOrFail($formules)->id;
            ImageManagerStatic::make($request->file('image'))->save(public_path()."/img/formules/$id.jpg");
        }
        return back()->with('success', 'La formule a bien été modifié !');
    }

    public function destroy($id){
        Option::where('id', $id)->delete();
        return back()->with('success', "L'option a été supprimé avec succès !");
    }

    public function update_option($id, Request $request){
        $data = $request->except(['_token']);
        Option::where('id', $id)->update($data);
        return back()->with('success', "L'option a été modifié avec succès !");
    }

    public function addOption($id){
        $lang = 'fr';
        $formule = Formule::findOrFail($id)->titre_formule;
        return view('reservation.option', compact('id', 'lang','formule'));
    }

    public function storeOption($id, Requests\optionRequest $request){
        $data = $request->except('_method', '_token');
        Option::create($data);
        return redirect(action('FormuleController@edit', $id))->with('success', "L'option a bien été créee !");
    }

}
