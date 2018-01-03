<?php

namespace App\Notifications\App\Order;

use App\Entities\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrder extends Notification
{
    use Queueable;


    protected $order;


    /**
     * Create a new notification instance.
     *
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;
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
            ->line('Thank you for choosing ' . config('app.name', 'Laravel') . '.')
            ->line('Please note that your order number is ' . $this->order->id. '.')
            ->line('Your order details are as follows:')

            ->line('Order Remarks:')



            ->action('Order details', url('/account/orders/'.$this->order->id))
            ->line('We hope you\'ve enjoyed your '. config('app.name', 'Laravel') . ' experience.')
            ->line('Regards')
            ->line('The   '. config('app.name', 'Laravel') . '.')
            ->line('This is a system-generated email. Please do not reply.');


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
