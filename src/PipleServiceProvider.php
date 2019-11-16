<?php

namespace Abdelrahman_badr\Pipl;

use Illuminate\Support\ServiceProvider;

class PipleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance('Pipl', new  \Abdelrahman_badr\Pipl\Pipl());
    }
}
