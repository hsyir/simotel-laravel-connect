<?php

namespace Hsy\SimotelConnect;

use Illuminate\Support\ServiceProvider;

class SimotelApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/simotel.php", "simotel");
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__ . "/../config" => config_path("simotel.php")], "config");
    }
}
