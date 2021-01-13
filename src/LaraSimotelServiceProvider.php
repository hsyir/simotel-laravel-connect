<?php

namespace Hsy\LaraSimotel;

use Hsy\Simotel\Simotel;
use Illuminate\Support\ServiceProvider;

class LaraSimotelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(Simotel::getDefaultConfigPath(),"simotel");
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

    private function registerEvents()
    {

    }
}
