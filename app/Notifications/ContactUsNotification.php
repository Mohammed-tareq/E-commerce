<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $contact)
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
        return ['database','broadcast'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'contact_id' => $this->contact->id,
            'name'       => $this->contact->name,
            'email'      => $this->contact->email,
            'subject'    => $this->contact->subject,
            'create_at'  => now()->toDateTimeString(),
        ];
    }
    public function databaseType(object $notifiable): string
    {
        return 'contact-created';
    }

    public function broadcastType(): string
    {
        return 'contact-created';
    }
}
