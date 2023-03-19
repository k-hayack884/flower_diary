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
use App\Packages\infrastructures\Comment\CommentRepository;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\infrastructures\Diary\DiaryRepository;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\infrastructures\Plant\PlantRepository;
use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\infrastructures\PlantUnit\PlantUnitRepository;
use App\Packages\infrastructures\Shared\Transaction;
use App\Packages\infrastructures\Shared\TransactionInterface;
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
            DiaryRepository::class
//            MockDiaryRepository::class
        );
        $this->app->bind(
            CommentRepositoryInterface::class,
            CommentRepository::class
//            MockCommentRepository::class
        );
        $this->app->bind(
            PlantUnitRepositoryInterface::class,
            PlantUnitRepository::class
//            MockPlantUnitRepository::class
        );
        $this->app->bind(
            PlantRepositoryInterface::class,
            PlantRepository::class
        );
        $this->app->bind(
            TransactionInterface::class,
            Transaction::class
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
