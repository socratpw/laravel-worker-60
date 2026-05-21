<?php

namespace App\Providers;

use App\Events\Worker\CreateEvent;
use App\Listeners\Worker\CreateProfileListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        CreateEvent::class => [
            CreateProfileListener::class,
        ]


    ];

    public function boot(): void
    {
        //
    }
}
