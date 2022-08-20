<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Auth\Events\Registered;
use App\Listeners\toAdminTransactionListener;
use App\Listeners\MunicipalityTransactionListener;
use App\Listeners\MtoPTransactionListener;
use App\Events\toAdminTransactionEvent;
use App\Events\MunicipalityTransactionEvent;
use App\Events\MtoPTransactionEvent;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        MunicipalityTransactionEvent::class =>[
            MunicipalityTransactionListener::class,
        ],
        MtoPTransactionEvent::class =>[
            MtoPTransactionListener::class
        ],
        toAdminTransactionEvent::class => [
            toAdminTransactionListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
