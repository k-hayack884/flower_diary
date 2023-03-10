<?php

namespace App\Providers;

use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\infrastructures\Plant\PlantRepository;
use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
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
        $this->app->bind(
            CheckSeatRepositoryInterface::class,
            MockCheckSeatRepository::class
        );
        $this->app->bind(
            DiaryRepositoryInterface::class,
            MockDiaryRepository::class
        );
        $this->app->bind(
            CommentRepositoryInterface::class,
            MockCommentRepository::class
        );
        $this->app->bind(
            PlantUnitRepositoryInterface::class,
            MockPlantUnitRepository::class
        );
        $this->app->bind(
            PlantRepositoryInterface::class,
            PlantRepository::class
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
