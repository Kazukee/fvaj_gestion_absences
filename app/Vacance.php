<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacance extends Model
{
    protected $fillable = ['label', 'date_in', 'date_out'];

    public function volee() {
        return $this->belongsTo('App\Volee');
    }
}
