<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['date_in', 'date_out', 'time_in', 'time_out', 'raison'];

    public function eleve() {
        return $this->belongsTo('App\Eleve');
    }
}
