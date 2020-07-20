<?php

namespace Netgroup\AtaTechSms;

use Illuminate\Support\ServiceProvider;

class AtaSmsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([__DIR__.'/../config/atasms.php' => config_path('atasms.php')], 'config');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
