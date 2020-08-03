<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RentRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line($this->details['title'])
                    ->action('Accept', url('/'))
                    ->line($this->details['body'] . 'Form:' . $this->details['dateFrom'] . 'Until:' . $this->details['dateTo']);
    }

    public function toDatabase($notifiable)
    {
        return [
            'itemId' => $this->details['itemId'],
            'renterId' => $this->details['renterId'],
            'title' => $this->details['title'],
            'body' => $this->details['body'],
            'amount' => $this->details['amount'],
            'dateFrom' => $this->details['dateFrom'],
            'dateTo' => $this->details['dateTo'],
        ];
    }
}
