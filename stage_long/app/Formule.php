<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic;

class Formule extends Model
{
    protected $fillable = ['titre_formule', 'formule_id','titre_formule_ang','online','description', 'description_ang', 'image', 'prix'];

    public function scopeOnline($query){
        return $query->where('online',1);
    }

    public function options(){
        return $this->hasMany('App\Option');
    }

    public function getImageAttribute($image){
            return "{$this->id}.jpg";
    }

}
