<?php

namespace App\Providers;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\infrastructures\Water\MockWaterRepository;
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
       $this->app->bind(
           WaterSettingRepositoryInterface::class,
           MockWaterRepository::class
       );
        $this->app->bind(
            FertilizerRepositoryInterface::class,
            MockFertilizerRepository::class
        );
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
