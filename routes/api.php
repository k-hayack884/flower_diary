<?php

use App\Packages\Presentations\Controllers\Water\WaterSettingController;
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

Route::get(
    'waterSetting',
    [WaterSettingController::class,'index']
);
Route::get(
    'waterSetting/{waterSettingId}',
    [WaterSettingController::class,'show']
);
Route::post(
    'waterSetting',
    [WaterSettingController::class,'create']
);
