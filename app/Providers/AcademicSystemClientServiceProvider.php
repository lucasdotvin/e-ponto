<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AcademicSystemClientServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Services\SUAPClientService', function($app) {
            return new \App\Services\SUAPClientService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
