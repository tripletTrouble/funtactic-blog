<?php

namespace App\Providers;

use App\Services\SettingService;
use App\Services\CategoryService;
use App\Services\UserProfileService;
use App\Services\UserService;
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
        $this->app->bind('userprofiles', function () {
            return new UserProfileService;
        });
        $this->app->bind('users', function () {
            return new UserService;
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
