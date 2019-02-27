<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volee extends Model
{
    protected $fillable = ['label', 'date_in', 'date_out'];

    public function vacances() {
        return $this->hasMany('App\Vacance');
    }

    public function classes() {
        return $this->hasMany('App\Classe');
    }
}
