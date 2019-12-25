<?php

namespace App\Providers;

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
        $this->app->bind('App\Services\Weather\MockService\MockService', function ($app) {
            return new \App\Services\Weather\MockService\MockService(new \App\Services\Weather\MockService\Parsers\CsvParser(config('weather.mock_service_id')));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
