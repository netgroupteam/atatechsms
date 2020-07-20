<?php

namespace Netgroup\AtaSms;

use Illuminate\Support\ServiceProvider;

class AtaSmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
                __DIR__ . "/../config/details.php" => config_path('details.php')
            ]
        );
    }
}
