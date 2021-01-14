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
        $this->mergeConfigFrom(__DIR__ . "/../config/simotel.php", "simotel");

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
                __DIR__ . "/../config/simotel.php" => config_path('simotel.php'),
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
        //["Cdr", "ExtenAdded", "ExtenRemoved", "IncomingCall", "NewState", "OutgoingCall", "Transfer"]
        $events = array_keys(config("simotel.simotelEventApi.events"));

        array_walk($events, function ($event) {
            SimotelFacade::eventApi()->addListener($event, function ($data) use ($event) {
                $eventClass = config("simotel.simotelEventApi.events." . $event);
                event(new $eventClass($data));
            });
        });

    }
}
