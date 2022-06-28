<?php

namespace App\Providers;

use App\Services\SettingService;
use App\Services\CategoryService;
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
        $this->app->bind('categories', function () {
            return new CategoryService;
        });
        $this->app->bind('settings', function () {
            return new SettingService;
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
