<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class options_resa extends Model
{
    protected $fillable = ['nom_option', 'reservation_id', 'cadeau_id'];

    public function reservations(){
        return $this->belongsTo('App\Reservation');
    }
}
