<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Libs\CommandBus\LaravelCommandBus;
use Modules\Shared\Bus\CommandBusContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(
            abstract: CommandBusContract::class,
            concrete: LaravelCommandBus::class,
        );
    }
}
