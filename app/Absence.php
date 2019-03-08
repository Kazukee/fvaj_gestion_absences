<?php

namespace App;

use App\Events\AbsenceCreated;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $fillable = ['date_in', 'date_out', 'time_in', 'time_out', 'raison', 'eleve_utilisateur_id'];

    public function eleve() {
        return $this->belongsTo('App\Eleve');
    }

    public function eleve_utilisateur() {
        return $this->belongsTo('\App\EleveUtilisateur');
    }

    protected $dispatchesEvents = [
        'created' => AbsenceCreated::class,
    ];
}
