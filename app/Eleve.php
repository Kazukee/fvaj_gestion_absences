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

    public function utilisateurs() {
        return $this->belongsToMany('App\Utilisateur', 'eleve_utilisateur')->withPivot('eleve_id', 'utilisateur_id');
    }
}
