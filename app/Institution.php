<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['nom', 'adresse', 'telephone', 'email'];

    public function utilisateurs() {
        return $this->hasMany('App\Utilisateur');
    }
}
