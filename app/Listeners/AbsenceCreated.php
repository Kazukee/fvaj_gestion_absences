<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use App\ {
    Events\AbsenceCreated as AbsenceCreatedEvent,
    Notifications\AbsenceCreated as SendNotificationAbsenceCreated,
    Utilisateur
};


class AbsenceCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(AbsenceCreatedEvent $event)
    {
        $utilisateurs = DB::table('utilisateurs')->select('utilisateurs.email')
                            ->join('eleve_utilisateur', 'utilisateurs.id', '=', 'eleve_utilisateur.utilisateur_id')
                            ->where('eleve_utilisateur.eleve_id', '=', $event->absence->eleve_id)->get();

        foreach ($utilisateurs as $utilisateur) {
            Notification::send(Utilisateur::where('email', $utilisateur->email)->get(), new SendNotificationAbsenceCreated($event->absence));
        }
    }
}
