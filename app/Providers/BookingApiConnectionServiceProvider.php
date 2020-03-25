<?php

namespace App\Providers;

use App\Services\BookingApiConnection;
use Illuminate\Support\ServiceProvider;

// php artisan config:clear
class BookingApiConnectionServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BookingApiConnection::class, function ($app) {
            return new BookingApiConnection();
        });
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
