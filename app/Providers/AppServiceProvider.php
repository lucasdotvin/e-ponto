<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Services\StudentWorkloadDataService', function($app) {
            return new \App\Services\StudentWorkloadDataService();
        });

        $this->app->bind('\App\Services\ReportDataGeneratorService', function($app) {
            return new \App\Services\ReportDataGeneratorService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
