<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Model
{
    use Notifiable;

    protected $fillable = [
        'institution_id', 'titre', 'nom', 'prenom', 'telephone', 'adresse', 'date_de_naissance', 'email', 'mot_de_passe'
    ];

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
