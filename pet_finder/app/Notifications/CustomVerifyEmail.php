<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
    // php artisan make:notification CustomVerifyEmail

    public function toMail(object $notifiable): MailMessage
    {
        // $url = $this->verificationUrl($notifiable);
        return (new MailMessage)->view(
            'emails.verify',
            ['url' => url("/")]
        );
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

    // protected function verificationUrl($notifiable)
    // {
    //     // Aquí deberías generar la URL de verificación. Este es solo un ejemplo.
    //     // Reemplaza esto con tu propia lógica para generar la URL.
    //     $verificationId = $notifiable->getKey();
    //     $hash = sha1($notifiable->getEmailForVerification());

    //     return URL::temporarySignedRoute(
    //         'verification.verify', // Asume que tienes una ruta llamada 'verification.verify'
    //         Carbon::now()->addMinutes(60), // La URL expira en 60 minutos
    //         ['id' => $verificationId, 'hash' => $hash]
    //     );
    // }

}
