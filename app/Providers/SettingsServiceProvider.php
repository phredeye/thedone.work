<?php

namespace App\Providers;

use App\Settings\SiteSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->runningInConsole()) {
            $site = $this->app->get(SiteSettings::class);
            View::share('settings', (object)[
                'site' => $site
            ]);
        }
    }
}
