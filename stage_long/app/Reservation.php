<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['nom', 'prenom', 'jours', 'debut', 'fin', 'formule', 'prix_total', 'adresse','code_postal','ville','mail', 'numero_telephone', 'type_paiement','code'];

    public function options(){
         return $this->hasMany('App\options_resa');
     }

}
