<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $fillable = ['label', 'description'];

    public $table = 'lieux';

    public function luam() {
        return $this->hasMany('App\Eleve', 'fk_luam', 'id');
    }

    public function lupm() {
        return $this->hasMany('App\Eleve', 'fk_lupm', 'id');
    }

    public function luev() {
        return $this->hasMany('App\Eleve', 'fk_luev', 'id');
    }

    public function maam() {
        return $this->hasMany('App\Eleve', 'fk_maam', 'id');
    }

    public function mapm() {
        return $this->hasMany('App\Eleve', 'fk_mapm', 'id');
    }

    public function maev() {
        return $this->hasMany('App\Eleve', 'fk_maev', 'id');
    }

    public function meam() {
        return $this->hasMany('App\Eleve', 'fk_meam', 'id');
    }

    public function mepm() {
        return $this->hasMany('App\Eleve', 'fk_mepm', 'id');
    }

    public function meev() {
        return $this->hasMany('App\Eleve', 'fk_meev', 'id');
    }

    public function jeam() {
        return $this->hasMany('App\Eleve', 'fk_jeam', 'id');
    }

    public function jepm() {
        return $this->hasMany('App\Eleve', 'fk_jepm', 'id');
    }

    public function jeev() {
        return $this->hasMany('App\Eleve', 'fk_jeev', 'id');
    }

    public function veam() {
        return $this->hasMany('App\Eleve', 'fk_veam', 'id');
    }

    public function vepm() {
        return $this->hasMany('App\Eleve', 'fk_vepm', 'id');
    }

    public function veev() {
        return $this->hasMany('App\Eleve', 'fk_veev', 'id');
    }
}
