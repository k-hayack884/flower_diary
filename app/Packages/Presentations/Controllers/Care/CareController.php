<?php

namespace App\Packages\Presentations\Controllers\Care;

use App\Packages\Presentations\Requests\Care\GetCareFertilizerRequest;
use App\Packages\Presentations\Requests\Care\GetCareWaterRequest;
use App\Packages\Presentations\Requests\Care\PushCareFertilizerRequest;
use App\Packages\Presentations\Requests\Care\PushCareWaterRequest;
use App\Packages\Usecases\Care\GetCareFertilizerAction;
use App\Packages\Usecases\Care\GetCareWaterAction;
use App\Packages\Usecases\Care\PushCareFertilizerAction;
use App\Packages\Usecases\Care\PushCareWaterAction;

class CareController extends \App\Http\Controllers\Controller
{
    public function indexWater(
        GetCareWaterRequest $request,
        GetCareWaterAction  $action,
    ): array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }
    public function indexFertilizer(
        GetCareFertilizerRequest $request,
        GetCareFertilizerAction  $action,
    ): array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }
    public function pushWater(
        PushCareWaterRequest $request,
        PushCareWaterAction  $action,
    )
    {
        $alertTimeId = $request->input('alertTimeId');
        $request->merge(['userId' => $alertTimeId]);
        return (array) $action($request);
    }
    public function pushFertilizer(
        PushCareFertilizerRequest $request,
        PushCareFertilizerAction  $action,
    )
    {
        $alertTimeId = $request->input('alertTimeId');
        $request->merge(['userId' => $alertTimeId]);
        return (array) $action($request);
    }
}
