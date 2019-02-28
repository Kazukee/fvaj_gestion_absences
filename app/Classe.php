<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = ['volee_id', 'fk_luam', 'fk_lupm', 'fk_maam', 'fk_mapm', 'fk_meam', 'fk_mepm', 'fk_jeam', 'fk_jepm', 'fk_veam', 'fk_vepm', 'code'];

    public function volee() {
        return $this->belongsTo('App\Volee');
    }

    public function matiere_luam() {
        return $this->belongsTo('App\Matiere', 'fk_luam', 'id');
    }

    public function matiere_lupm() {
        return $this->belongsTo('App\Matiere', 'fk_lupm', 'id');
    }

    public function matiere_maam() {
        return $this->belongsTo('App\Matiere', 'fk_maam', 'id');
    }

    public function matiere_mapm() {
        return $this->belongsTo('App\Matiere', 'fk_mapm', 'id');
    }

    public function matiere_meam() {
        return $this->belongsTo('App\Matiere', 'fk_meam', 'id');
    }

    public function matiere_mepm() {
        return $this->belongsTo('App\Matiere', 'fk_mepm', 'id');
    }

    public function matiere_jeam() {
        return $this->belongsTo('App\Matiere', 'fk_jeam', 'id');
    }

    public function matiere_jepm() {
        return $this->belongsTo('App\Matiere', 'fk_jepm', 'id');
    }

    public function matiere_veam() {
        return $this->belongsTo('App\Matiere', 'fk_veam', 'id');
    }

    public function matiere_vepm() {
        return $this->belongsTo('App\Matiere', 'fk_vepm', 'id');
    }

    public function eleves() {
        return $this->hasMany('App\Eleve');
    }
}
