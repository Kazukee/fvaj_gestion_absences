<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['label'];

    public function eleves_utilisateurs() {
        return $this->hasMany('App\EleveUtilisateur');
    }
}
