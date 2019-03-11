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

        if($msg->date_in == $msg->date_out && empty($msg->time_in) && empty($msg->time_out)) {
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été créée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('Il a été noté absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !');
        }

        if(empty($msg->time_in) && empty($msg->time_out)){
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été créée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('Il sera absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' au ' . date('d.m.Y', strtotime($msg->date_out)) . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !');
        }

        if($msg->date_in == $msg->date_out && !empty($msg->time_in) && !empty($msg->time_out)) {
            return (new MailMEssage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été créée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('Il a été noté absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' de  ' . $msg->time_in . ' à ' . $msg->time_out . ' pour raison de ' . strtolower($msg->raison) . '.')
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
