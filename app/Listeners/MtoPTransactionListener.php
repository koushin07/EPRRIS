<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\MtoPNotification;
use App\Events\MtoPTransactionEvent;
use Notification;

class MtoPTransactionListener
{
  
    public function handle(MtoPTransactionEvent $event)
    {
        Notification::send( $event->province, new MtoPNotification($event->province));
    }
}
