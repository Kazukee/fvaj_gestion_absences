<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['code'];

    public function volee() {
        return $this->belongsTo('App\Volee');
    }

    public function matiere() {
        return $this->belongsTo('App\Matiere');
    }

    public function eleves() {
        return $this->hasMany('App\Eleve');
    }
}
