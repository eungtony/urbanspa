<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['options', 'option_ang', 'infos', 'infos_ang', 'prix', 'formule_id'];

    public function formules(){
        return $this->belongsTo('App\Formule');
    }
}
