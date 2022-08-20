<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MtoPNotification extends Notification
{
    use Queueable;

    public $province;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($province)
    {
        $this->province = $province;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

 
    public function toArray($notifiable)
    {
        return [
            'province' =>$this->province->province_name
        ];
    }
}
