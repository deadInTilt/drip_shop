<?php

namespace App\Providers;

use App\Models\Brand;
use App\Observers\BrandObserver;
use App\Services\Logger\FileLogger;
use App\Services\Logger\LoggerInterface;
use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoggerInterface::class, FileLogger::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventSilentlyDiscardingAttributes(!app()->isProduction());
        Brand::observe(BrandObserver::class);
    }
}
