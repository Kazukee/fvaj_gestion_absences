<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $fillable = ['titre', 'nom', 'prenom', 'telephone', 'adresse', 'date_de_naissance', 'email'];
}
