<?php

namespace Hsy\LaraSimotel;

use Hsy\LaraSimotel\Events\SimotelEventCdr;
use Hsy\Simotel\Simotel;
use Illuminate\Support\ServiceProvider;
use Shetabit\Multipay\Payment;
use Shetabit\Payment\Events\InvoicePurchasedEvent;
use Shetabit\Payment\Events\InvoiceVerifiedEvent;
use Hsy\LaraSimotel\Facades\Simotel as SimotelFacade;

class LaraSimotelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(Simotel::getDefaultConfigPath(), "simotel");

        /**
         * Bind to service container.
         */
        $this->app->bind('laraSimotel', function () {
            $config = config('simotel') ?? [];

            return new Simotel($config);
        });

        $this->registerEvents();

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Configurations that needs to be done by user.
         */
        $this->publishes(
            [
                Simotel::getDefaultConfigPath() => config_path('simotel.php'),
            ],
            'config'
        );
    }


    /**
     * Register Laravel events.
     *
     * @return void
     */
    public function registerEvents()
    {
        $events = ["Cdr", "ExtenAdded", "ExtenRemoved", "IncomingCall", "NewState", "OutgoingCall", "Transfer"];
        array_walk($events, function ($event) {
            SimotelFacade::eventApi()->addListener($event, function ($data) use ($event) {
                $eventClass = "Hsy\\LaraSimotel\\Events\\SimotelEvent" . $event;
                event(new $eventClass($data));
            });
        });
    }
}
