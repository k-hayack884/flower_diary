<?php

use App\Packages\Presentations\Controllers\Comment\CommentController;
use App\Packages\Presentations\Controllers\Diary\DiaryController;
use App\Packages\Presentations\Controllers\Plant\ScanPlantController;
use App\Packages\Presentations\Controllers\PlantUnit\PlantUnitController;
use App\Packages\Presentations\Controllers\Water\WaterSettingController;
use App\Packages\Presentations\Controllers\Fertilizer\FertilizerSettingController;
use App\Packages\Presentations\Controllers\CheckSeat\CheckSeatController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    dd($request);
    return $request->user();
});


Route::middleware('auth:sanctum')->get('/hoge', function (Request $request) {
    return response()->json([
        'message' => $request->user()->tokenCan('dorube')
            ? 'You are Superman!!'
            : 'You are NOT Superman.',
    ]);
});
//植物のスキャン
Route::post(
    'scanPlant',
    [ScanPlantController::class,'scan']
);

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
Route::delete(
    'waterSetting/{waterSettingId}',
    [WaterSettingController::class,'delete']
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
Route::delete(
    'fertilizerSetting/{fertilizerSettingId}',
    [FertilizerSettingController::class,'delete']
);

//チェックシートルート

Route::post(
    'checkSeat',
    [CheckSeatController::class,'create']
);
Route::get(
    'checkSeat/{checkSeatId}',
    [CheckSeatController::class,'show']
);
Route::put(
    'checkSeat/{checkSeatId}/reset',
    [CheckSeatController::class,'reset']
);

//日記
Route::get(
    'diary',
    [DiaryController::class,'index']
);
Route::post(
    'diary',
    [DiaryController::class,'create']
);
Route::get(
    'diary/{diaryId}',
    [DiaryController::class,'show']
);
Route::put(
    'diary/{diaryId}',
    [DiaryController::class,'update']
);
Route::delete(
    'diary/{diaryId}',
    [DiaryController::class,'delete']
);

//コメント
Route::get(
    'comment',
    [CommentController::class,'index']
);
Route::post(
    'comment',
    [CommentController::class,'create']
);
Route::get(
    'comment/{commentId}',
    [CommentController::class,'show']
);
Route::put(
    'comment/{commentId}',
    [CommentController::class,'update']
);
Route::delete(
    'comment/{commentId}',
    [CommentController::class,'delete']
);

//植物ユニット
Route::middleware('auth:sanctum')->get(
    'plantUnit',
    [PlantUnitController::class,'index']
);
Route::post(
    'plantUnit',
    [PlantUnitController::class,'create']
);
Route::middleware('auth:sanctum')->get(
    'plantUnit/{plantUnitId}',
    [PlantUnitController::class,'show']
);
Route::delete(
    'plantUnit/{plantUnitId}',
    [PlantUnitController::class,'delete']
);
