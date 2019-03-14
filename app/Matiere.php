<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['utilisateur_id', 'label'];

    public function luam() {
        return $this->hasMany('App\Classe', 'fk_luam', 'id');
    }

    public function lupm() {
        return $this->hasMany('App\Classe', 'fk_lupm', 'id');
    }

    public function maam() {
        return $this->hasMany('App\Classe', 'fk_maam', 'id');
    }

    public function mapm() {
        return $this->hasMany('App\Classe', 'fk_mapm', 'id');
    }

    public function meam() {
        return $this->hasMany('App\Classe', 'fk_meam', 'id');
    }

    public function mepm() {
        return $this->hasMany('App\Classe', 'fk_mepm', 'id');
    }

    public function jeam() {
        return $this->hasMany('App\Classe', 'fk_jeam', 'id');
    }

    public function jepm() {
        return $this->hasMany('App\Classe', 'fk_jepm', 'id');
    }

    public function veam() {
        return $this->hasMany('App\Classe', 'fk_veam', 'id');
    }

    public function vepm() {
        return $this->hasMany('App\Classe', 'fk_vepm', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
