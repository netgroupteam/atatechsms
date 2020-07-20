<?php

namespace Netgroup\AtaTechSms;

use Illuminate\Support\ServiceProvider;

class AtaTechSmsServiceProvider extends ServiceProvider
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
                __DIR__ . "/../config/atatechsms.php" => config_path('atatechsms.php')
            ]
        );
    }
}
