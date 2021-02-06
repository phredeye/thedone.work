<?php

namespace App\Providers;

use App\Contracts\SettingsInterface;
use App\Support\Settings;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->runningInConsole()) {
            $this->app->bind(SettingsInterface::class, function () {
                $settings = new Settings();
                return $settings;
            });

            View::share('settings', app()->get(SettingsInterface::class));
        }
    }
}
