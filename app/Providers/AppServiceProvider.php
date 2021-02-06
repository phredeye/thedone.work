<?php

namespace App\Providers;

use App\Contracts\SettingsRepositoryInterface;
use App\Support\DbSettingsRepository;
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

        $this->app->bind(SettingsRepositoryInterface::class, function () {
            $settings = new DbSettingsRepository();
            $settings->loadAll();
            return $settings;
        });

        if (!$this->app->runningInConsole()) {
            View::share('settings', app()->get(SettingsRepositoryInterface::class));
        }
    }
}
