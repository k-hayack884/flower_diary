<?php

use App\Packages\Presentations\Controllers\Water\WaterSettingController;
use App\Packages\Presentations\Controllers\Fertilizer\FertilizerSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//水の設定のルート
Route::get(
    'waterSetting',
    [WaterSettingController::class,'index']
);
Route::post(
    'waterSetting',
    [WaterSettingController::class,'create']
);
Route::get(
    'waterSetting/{waterSettingId}',
    [WaterSettingController::class,'show']
);
Route::put(
    'waterSetting/{waterSettingId}',
    [WaterSettingController::class,'update']
);
Route::put(
    'waterSetting/{waterSettingId}/reset',
    [WaterSettingController::class,'reset']
);
//肥料設定のルート
Route::get(
    'fertilizerSetting',
    [FertilizerSettingController::class,'index']
);
Route::post(
    'fertilizerSetting',
    [FertilizerSettingController::class,'create']
);
Route::get(
    'fertilizerSetting/{fertilizerSettingId}',
    [FertilizerSettingController::class,'show']
);
Route::put(
    'fertilizerSetting/{fertilizerSettingId}',
    [FertilizerSettingController::class,'update']
);
Route::put(
    'fertilizerSetting/{fertilizerSettingId}/reset',
    [FertilizerSettingController::class,'reset']
);
