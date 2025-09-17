<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAdmin extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $code;  // constructeur recuperer le code et l'email envoyer par le controller
    public $email;
    public function __construct($codetosend, $emailtosend)
    {
        $this->code = $codetosend;
        $this->email = $emailtosend;
    }
   

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(' Création de votre compte administrateur')
            ->line('Bonjour')
            ->line('Votre compte administrateur a été créé avec succès. Veuillez utiliser les informations suivantes pour vous connecter et changer votre mot de passe.')
            ->line('Cliquer sur le bouton ci-dessous pour valider votre compte')
            ->line('Saisissez le code: '.$this->code.' et renseignez le dans le formulaire qui apparaitra')
            ->action('Cliquer ici', url('/validate-account/'.urlencode($this->email)))
            ->line('Merci d\'utiliser nos services !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
