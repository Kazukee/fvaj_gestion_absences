<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Notification;
use App\{Events\AbsenceCreated as AbsenceCreatedEvent,
    Notifications\AbsenceCreated as SendNotificationAbsenceCreated,
    Absence,
    Utilisateur};

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
        $utilisateur = Utilisateur::with('utilisateurs')->select('email')->where('nom', '=', 'Rausis');

        Notification::send($utilisateur, new SendNotificationAbsenceCreated($event->absence));
    }
}
