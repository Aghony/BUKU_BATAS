<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Support\ServiceProvider;
use App\Http\MiddlewareRegister;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->app['Illuminate\Console\Scheduling\Schedule']
        // ->call(function () {
        //     User::where('last_activity', '<', now()->subMinutes(5))
        //         ->update(['is_online' => false]);
        // })->everyFiveMinutes();

        // $this->app->make('Illuminate\Console\Scheduling\Schedule')->call(function () {
        //     User::where('last_activity', '<', now()->subMinutes(5))
        //         ->update(['is_online' => false]);
        // })->everyFiveMinutes();
    }
}
