<?php

namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\SettingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\UserProfileRepository;
use App\Interfaces\ArticleRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\SettingRespositoryInterface;
use App\Interfaces\UserProfileRepositoryInterface;

class RespositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SettingRespositoryInterface::class, SettingRepository::class);
        $this->app->bind(UserProfileRepositoryInterface::class, UserProfileRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
