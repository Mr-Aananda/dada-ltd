<?php

namespace App\Providers;

use App\Repositories\Production\ProductionRepository;
use App\Repositories\Production\ProductionRepositoryInterface;
use App\Repositories\Url\UrlRepository;
use App\Repositories\Url\UrlRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
        $this->app->bind(ProductionRepositoryInterface::class, ProductionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
