<?php

namespace Netgroup\AtaTechSms;

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
                __DIR__ . "/../config/atasms.php" => config_path('atasms.php')
            ]
        );
    }
}
