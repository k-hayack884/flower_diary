<?php

namespace App\Providers;

use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Infrastructures\CheckSeat\CheckSeatRepository;
use App\Packages\Infrastructures\Comment\CommentRepository;
use App\Packages\Infrastructures\Diary\DiaryRepository;
use App\Packages\Infrastructures\Fertilizer\FertilizerSettingRepository;
use App\Packages\Infrastructures\Plant\PlantRepository;
use App\Packages\Infrastructures\PlantUnit\PlantUnitRepository;
use App\Packages\Infrastructures\Shared\Transaction;
use App\Packages\Infrastructures\Shared\TransactionInterface;
use App\Packages\Infrastructures\Water\WaterSettingRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
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
            WaterSettingRepository::class,
//            MockWaterRepository::class
        );
        $this->app->bind(
            FertilizerRepositoryInterface::class,
            FertilizerSettingRepository::class,
//            MockFertilizerRepository::class
        );
        $this->app->bind(
            CheckSeatRepositoryInterface::class,
            CheckSeatRepository::class,
//            MockCheckSeatRepository::class
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
        Schema::defaultStringLength(150);
        if ($this->app->environment() == 'production') {
            URL::forceScheme('https');
        }
    }
}


