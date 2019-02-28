<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = ['institution_id', 'titre', 'nom', 'prenom', 'telephone', 'adresse', 'date_de_naissance', 'email'];

    public function matiere() {
        return $this->hasOne('App\Matiere');
    }

    public function institution() {
        return $this->belongsTo('App\Institution');
    }

    public function eleves() {
        return $this->belongsToMany('App\Eleve', 'eleve_utilisateur')->withPivot('eleve_id', 'utilisateur_id');
    }
}
