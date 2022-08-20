<?php

namespace App\Listeners;

use App\Events\MunicipalityTransactionEvent;
use App\Notifications\MunicipalityTransactionNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;

class MunicipalityTransactionListener
{
   
    public function handle(MunicipalityTransactionEvent $event)
    {
        Notification::send( $event->owner['owner'], new MunicipalityTransactionNotification($event->owner['owner']));
    }
}
