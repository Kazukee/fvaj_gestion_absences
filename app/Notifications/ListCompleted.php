<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use PhpParser\Node\Stmt\Return_;

class ListCompleted extends Notification
{
    protected $presences_eleves;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($presences_eleves)
    {
        $this->presences_eleves = $presences_eleves;
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
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('fiche_de_presences', $this->presences_eleves)->setPaper('a4', 'landscape');

        return (new MailMessage)
            ->greeting('Bonjour !')
            ->subject('Fiche de présences')
            ->line('Vous venez de remplir une feuille de présences.')
            ->line('Vous trouverez, ci-joint, la version PDF de celle-ci.')
            ->salutation('Merci de vous en occuper !')
            ->attachData($pdf->output(), 'FP - '. $this->presences_eleves['classes_eleve'][0][0]->code . ' ' . ' - ' . date('d.m.Y') . '.pdf', ['mime' => 'application/pdf']);
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
