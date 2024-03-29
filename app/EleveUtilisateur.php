<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EleveUtilisateur extends Model
{
    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function absences() {
        return $this->hasMany('App\Absence');
    }
}
