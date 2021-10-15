<?php

namespace App\Providers;

use App\Events\BookedTickets;
use App\Events\CancelTickets;
use App\Events\RoomCreated;
use App\Events\RoomDeleted;
use App\Listeners\DeleteChairs;
use App\Listeners\MakeChairs;
use App\Listeners\UpdateChair;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RoomCreated::class => [
            MakeChairs::class,
        ],
        RoomDeleted::class => [
            DeleteChairs::class,
        ],
        BookedTickets::class =>[
            UpdateChair::class,
        ],
        CancelTickets::class => [
            UpdateChair::class,
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
}
