<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
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
        return ['database','broadcast'];
    }




    public function toArray(object $notifiable): array
    {
        return [
            'order_id' => $this->order->id,
            'user'=>$this->order->first_name.' '.$this->order->last_name,
            'number' => $this->order->user_phone,
            'total' => $this->order->total_price,
            'status' => $this->order->status,
            'create_at' => now()->toDateTimeString(),
            'link' => route('dashboard.order.show',$this->order->id)
        ];
    }
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'order_id' => $this->order->id,
            'user'=>$this->order->first_name.' '.$this->order->last_name,
            'number' => $this->order->user_phone,
            'total' => $this->order->total_price,
            'status' => $this->order->status,
            'create_at' => now()->toDateTimeString(),
            'link' => route('dashboard.order.show',$this->order->id)
        ]);
    }
    public function databaseType(object $notifiable): string
    {
        return 'order-created';
    }

    public function broadcastType(): string
    {
        return 'order-created';
    }
}
