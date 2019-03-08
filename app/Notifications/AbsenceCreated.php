<?php

namespace App\Notifications;

use App\Absence;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class AbsenceCreated extends Notification
{
    protected $absence;
    protected $nom;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Absence $absence)
    {
        $this->absence = $absence;

        //dd($absence = DB::table('absences')->orderBy('id', 'desc')->first());


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $msg = DB::table('absences')->select('eleves.titre AS titre', 'eleves.nom AS nom', 'eleves.prenom AS prenom', 'absences.raison AS raison',
                        'absences.date_in AS date_in', 'absences.date_out AS date_out', 'absences.time_in AS time_in', 'absences.time_out AS time_out')
                ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')->orderBy('absences.id', 'desc')->first();

        //dd($msg);
        if(empty($msg->date_out)) {
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été créée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('Il a été noté absent en date du ' . $msg->date_in . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !');
        } else {
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été créée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('Il sera absent en date du ' . $msg->date_in . ' au ' . $msg->date_out . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
