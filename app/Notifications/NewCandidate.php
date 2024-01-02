<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($vacancy_id, $vacancy_name, $user_id)
    {
        $this->vacancy_id = $vacancy_id;
        $this->vacancy_name = $vacancy_name;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable) : array
    {
        return [ 'mail', 'database' ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable) : MailMessage
    {
        return (new MailMessage)
            ->line('New candidate for vacancy: ' . $this->vacancy_name)
            ->action('Show notifications', url('/notifications'))
            ->line('Thank you for using DevJobs!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable) : array
    {
        return [
            //
        ];
    }

    // Almacena las notificaciones en la DB
    public function toDatabase(object $notifiable) : array
    {
        return [
            'vacancy_id' => $this->vacancy_id,
            'vacancy_name' => $this->vacancy_name,
            'user_id' => $this->user_id
        ];
    }
}
