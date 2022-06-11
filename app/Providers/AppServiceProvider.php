<?php

namespace App\Providers;

use App\Interfaces\UserServiceInterface;
use App\Services\UserSerivce;
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
        $this->app->bind(UserServiceInterface::class, UserSerivce::class);
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
