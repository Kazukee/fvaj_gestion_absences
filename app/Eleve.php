<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['classe_id', 'titre', 'nom', 'prenom', 'telephone', 'adresse', 'email_interne', 'email_externe'];

    public function absences() {
        return $this->hasMany('App\Absence');
    }

    public function classe() {
        return $this->belongsTo('App\Classe');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'eleve_utilisateur')->withPivot('eleve_id', 'user_id');
    }
}
