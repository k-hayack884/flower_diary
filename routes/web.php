<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('welcome');
});
Route::get('/addPlantImage', function () {
    return Inertia::render('AddPlantImage');
})->name('addPlantImage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('welcome');

    Route::get('/plantUnit', function () {
        return Inertia::render('PlantUnit', );
    })->name('plantUnit');

    Route::get('/plantUnit/{plantUnitId}', function ($plantUnitId) {
        return Inertia::render('PlantUnitDetail', [
            'plantUnitId' => $plantUnitId
        ]);

    })->name('plantUnitDetail');

    Route::get('/checkSeat/{checkSeatId}', function ($checkSeatId) {
        return Inertia::render('CheckSeat', [
            'checkSeatId' => $checkSeatId
        ]);
    })->name('checkSeat');
    Route::get('/todayCare', function () {
        return Inertia::render('TodayCare', );
    })->name('todayCare');

    Route::get('/adminComment', function () {
        return Inertia::render('Comment', [
        ]);
    });
    Route::get('/adminDiary', function () {
        return Inertia::render('Diary', [
        ]);
    });
//    Route::get('/adminCheckSeat', function () {
//        return Inertia::render('CheckSeat', [
//        ]);
//    });
    Route::get('/adminWaterSetting', function () {
        return Inertia::render('WaterSetting', [
        ]);
    });
    Route::get('/adminFertilizerSetting', function () {
        return Inertia::render('FertilizerSetting', [
        ]);
    });
});
Route::prefix('admin')
    ->middleware('can:admin')->group(function(){
        Route::get('index',function(){
       dd('admin');
        });
    });
