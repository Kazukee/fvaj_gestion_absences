<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;

class AttendanceCreated extends Notification
{
    protected $arr;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($arr)
    {
        $this->arr = $arr;
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
        $pdf->loadView('avis_dabsence', $this->arr);

        for ($i = 0; $i < count(collect($this->arr['nom_eleve'])); $i++) {
            if ($this->arr['raison'] != 'Présent') {
                return (new MailMessage)
                    ->greeting('Bonjour !')
                    ->subject('Nouvelle absence')
                    ->line('Une absence a été signalée pour ' . $this->arr['nom_eleve'][$i]->nom . ' ' . $this->arr['prenom_eleve'][$i]->prenom . '.')
                    ->line('L\'élève a été noté absent en date du ' . date('d.m.Y', strtotime($this->arr['date'])) . ' pour raison de : ' . strtolower($this->arr['raison']) . '.')
                    ->salutation('Merci d\'en prendre bonne note et meilleures salutations !')
                    ->attachData($pdf->output(), 'AA - '. $this->arr['nom_eleve'][$i]->nom . ' ' . $this->arr['prenom_eleve'][$i]->prenom . ' - ' . date('d.m.Y', strtotime($this->arr['date'])) . '.pdf', ['mime' => 'application/pdf']);
            }
        }
    }

    public function toNexmo($notifiable)
    {
        for ($i = 0; $i < count(collect($this->arr['nom_eleve'])); $i++) {
            if ($this->arr['raison'] != 'Présent') {
                return (new NexmoMessage)
                    ->from('Nexmo')
                    ->content('Bonjour, une absence a été signalée pour '  . $this->arr['nom_eleve'][$i]->nom . ' ' . $this->arr['prenom_eleve'][$i]->prenom . '.');
            }
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
