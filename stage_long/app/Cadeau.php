<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadeau extends Model
{
    protected $fillable = ['nom', 'prenom', 'jours', 'fin_cadeau', 'formule', 'prix_total', 'adresse','code_postal','ville','mail', 'numero_telephone', 'type_paiement','code', 'debut'];

    public function options(){
        return $this->hasMany('App\options_resa');
    }


}
