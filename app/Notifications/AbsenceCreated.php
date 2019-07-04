<?php

namespace App\Notifications;

use App\Absence;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class AbsenceCreated extends Notification
{
    protected $absence;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Absence $absence)
    {
        $this->absence = $absence;
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
        $eleve = DB::table('absences')->select('classes.code AS classe', 'eleves.titre AS titre', 'eleves.nom AS nom', 'eleves.prenom AS prenom', DB::raw("SUBSTRING_INDEX(eleves.adresse, ',', 1) AS 'adresse'"),
            DB::raw("TRIM(SUBSTRING_INDEX(eleves.adresse, ',', -1)) AS 'localite'"), 'absences.raison AS raison', 'absences.date_in AS date_in', 'absences.date_out AS date_out',
            'absences.time_in AS time_in', 'absences.time_out AS time_out')
            ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')
            ->join('classes', 'eleves.classe_id', '=', 'classes.id')->orderBy('absences.id', 'desc')->first();

        $data = [
            'classe' => $eleve->classe,
            'titre' => $eleve->titre,
            'nom' => $eleve->nom,
            'prenom' => $eleve->prenom,
            'adresse' => $eleve->adresse,
            'localite' => $eleve->localite,
            'date_in' => date_format(new DateTime($eleve->date_in), 'd.m.Y'),
            'raison' => $eleve->raison,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('myPDF', $data);

        $msg = DB::table('absences')->select('eleves.titre AS titre', 'eleves.nom AS nom', 'eleves.prenom AS prenom', 'absences.raison AS raison',
            'absences.date_in AS date_in', 'absences.date_out AS date_out', 'absences.time_in AS time_in', 'absences.time_out AS time_out')
            ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')->orderBy('absences.id', 'desc')->first();

        if($msg->date_in == $msg->date_out && empty($msg->time_in) && empty($msg->time_out)) {
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('L\'élève a été noté absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' pour raison de : ' . strtolower($msg->raison) . '.')
                ->line('Vous trouverez ci-joint l\'avis d\'absence correspondant à celle-ci.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !')
                ->attachData($pdf->output(), 'AA - '. $eleve->nom . ' ' . $eleve->prenom . ' - ' . date_format(new DateTime($eleve->date_in), 'd.m.Y') . '.pdf', ['mime' => 'application/pdf']);
        }

        if(empty($msg->time_in) && empty($msg->time_out)){
            return (new MailMessage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('L\'élève sera absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' au ' . date('d.m.Y', strtotime($msg->date_out)) . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->line('Vous trouverez ci-joint l\'avis d\'absence correspondant à celle-ci.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !')
                ->attachData($pdf->output(), 'AA - '. $eleve->nom . ' ' . $eleve->prenom . ' - ' . date_format(new DateTime($eleve->date_in), 'd.m.Y') . '.pdf', ['mime' => 'application/pdf']);
        }

        if($msg->date_in == $msg->date_out && !empty($msg->time_in) && !empty($msg->time_out)) {
            return (new MailMEssage)
                ->greeting('Bonjour !')
                ->subject('Nouvelle absence')
                ->line('Une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom)
                ->line('L\'élève a été noté absent en date du ' . date('d.m.Y', strtotime($msg->date_in)) . ' de  ' . $msg->time_in . ' à ' . $msg->time_out . ' pour raison de ' . strtolower($msg->raison) . '.')
                ->line('Vous trouverez ci-joint l\'avis d\'absence correspondant à celle-ci.')
                ->salutation('Merci d\'en prendre bonne note et meilleures salutations !')
                ->attachData($pdf->output(), 'AA - '. $eleve->nom . ' ' . $eleve->prenom . ' - ' . date_format(new DateTime($eleve->date_in), 'd.m.Y') . '.pdf', ['mime' => 'application/pdf']);
        }
    }

    public function toNexmo($notifiable) {

        $msg = DB::table('absences')->select('eleves.titre AS titre', 'eleves.nom AS nom', 'eleves.prenom AS prenom', 'absences.raison AS raison',
            'absences.date_in AS date_in', 'absences.date_out AS date_out', 'absences.time_in AS time_in', 'absences.time_out AS time_out')
            ->join('eleves', 'absences.eleve_id', '=', 'eleves.id')->orderBy('absences.id', 'desc')->first();

        if($msg->date_in == $msg->date_out && empty($msg->time_in) && empty($msg->time_out)) {
            return (new NexmoMessage)
                ->from('Nexmo')
                ->content('Bonjour, une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom . '.');
        }

        if(empty($msg->time_in) && empty($msg->time_out)) {
            return (new NexmoMessage)
                ->from('Nexmo')
                ->content('Bonjour, une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom . '.');
        }

        if($msg->date_in == $msg->date_out && !empty($msg->time_in) && !empty($msg->time_out)) {
                return (new NexmoMessage)
                    ->from('Nexmo')
                    ->content('Bonjour, une absence a été signalée pour ' . $msg->titre . ' ' . $msg->prenom . ' ' . $msg->nom . '.');
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
