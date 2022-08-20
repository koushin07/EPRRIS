<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\toAdminTransactionNotification;

class toAdminTransactionListener
{
    
    public function handle($event)
    {
        Notification::send(  $event->admin, new toAdminTransactionNotification($event->admin));

    }
}
