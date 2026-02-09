<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateOrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $order)
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
        return ['database'];
    }




    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'user'=>$this->order->first_name.' '.$this->order->last_name,
            'number' => $this->order->order_number,
            'total' => $this->order->total,
            'status' => $this->order->status,
            'create_at' => $this->order->created_at->toDateTimeString(),
        ];
    }
    public function databaseType(object $notifiable): string
    {
        return 'order-paid';
    }
}
