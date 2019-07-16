<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['classe_id', 'fk_luam', 'fk_lupm', 'fk_luev','fk_maam', 'fk_mapm', 'fk_maev','fk_meam', 'fk_mepm', 'fk_meev',
                            'fk_jeam', 'fk_jepm', 'fk_jeev','fk_veam', 'fk_vepm', 'fk_veev','titre', 'nom', 'prenom', 'telephone',
                            'adresse', 'email_interne', 'email_externe'];

    public function absences() {
        return $this->hasMany('App\Absence');
    }

    public function classe() {
        return $this->belongsTo('App\Classe');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'eleve_utilisateur')->withPivot('eleve_id', 'user_id');
    }

    public function lieu_luam() {
        return $this->belongsTo('App\Lieu', 'fk_luam', 'id');
    }

    public function lieu_lupm() {
        return $this->belongsTo('App\Lieu', 'fk_lupm', 'id');
    }

    public function lieu_luev() {
        return $this->belongsTo('App\Lieu', 'fk_luev', 'id');
    }

    public function lieu_maam() {
        return $this->belongsTo('App\Lieu', 'fk_maam', 'id');
    }

    public function lieu_mapm() {
        return $this->belongsTo('App\Lieu', 'fk_mapm', 'id');
    }

    public function lieu_maev() {
        return $this->belongsTo('App\Lieu', 'fk_maev', 'id');
    }

    public function lieu_meam() {
        return $this->belongsTo('App\Lieu', 'fk_meam', 'id');
    }

    public function lieu_mepm() {
        return $this->belongsTo('App\Lieu', 'fk_mepm', 'id');
    }

    public function lieu_meev() {
        return $this->belongsTo('App\Lieu', 'fk_meev', 'id');
    }

    public function lieu_jeam() {
        return $this->belongsTo('App\Lieu', 'fk_jeam', 'id');
    }

    public function lieu_jepm() {
        return $this->belongsTo('App\Lieu', 'fk_jepm', 'id');
    }

    public function lieu_jeev() {
        return $this->belongsTo('App\Lieu', 'fk_jeev', 'id');
    }

    public function lieu_veam() {
        return $this->belongsTo('App\Lieu', 'fk_veam', 'id');
    }

    public function lieu_vepm() {
        return $this->belongsTo('App\Lieu', 'fk_vepm', 'id');
    }

    public function lieu_veev() {
        return $this->belongsTo('App\Lieu', 'fk_veev', 'id');
    }
}
