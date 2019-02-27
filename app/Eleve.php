<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $fillable = ['titre', 'nom', 'prenom', 'telephone', 'adresse', 'email_interne', 'email_externe'];
}
