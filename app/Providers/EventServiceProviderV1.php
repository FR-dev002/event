<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Event
use App\Repositories\Repository\Event\EventInterface;
use App\Repositories\Repository\Event\EventRepository;


class EventServiceProviderV1 extends ServiceProvider
{
     /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Event services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventInterface::class, EventRepository::class);
    }
}
