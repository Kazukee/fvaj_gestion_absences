<?php

namespace App\Notifications;

use App\Absence;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AbsenceCreated extends Notification
{
    protected $absence;
    protected $eleve;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Absence $absence, Eleve $eleve)
    {
        $this->absence = $absence;
        $this->eleve = $eleve;
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
        $titre = $this->eleve->titre;
        $nom = $this->eleve->nom;
        $prenom = $this->eleve->prenom;

        return (new MailMessage)
                    ->greeting('Bonjour !')
                    ->line($titre . ' ' . $nom . ' ' . $prenom . ' est absent.');
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
