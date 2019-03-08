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

        dd($absence = DB::table('absences')->orderBy('id', 'desc')->first());

        //dd($absence);
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
        return (new MailMessage)
                    ->greeting('Bonjour !')
                    ->subject('Nouvelle absence')
                    ->line();
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
