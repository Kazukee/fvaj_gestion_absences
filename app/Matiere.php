<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = ['label'];

    public function classes() {
        return $this->hasMany('App\Classe', 'fk_luam', 'id');
    }

    public function utilisateur() {
        return $this->belongsTo('App\Utilisateur');
    }
}
