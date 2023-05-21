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
    /**
     * @param GetCareWaterRequest $request
     * @param GetCareWaterAction $action
     * @return array
     */
    public function indexWater(
        GetCareWaterRequest $request,
        GetCareWaterAction  $action,
    ): array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }

    /**
     * @param GetCareFertilizerRequest $request
     * @param GetCareFertilizerAction $action
     * @return array
     */
    public function indexFertilizer(
        GetCareFertilizerRequest $request,
        GetCareFertilizerAction  $action,
    ): array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }

    /**
     * @param PushCareWaterRequest $request
     * @param PushCareWaterAction $action
     * @return array
     */
    public function pushWater(
        PushCareWaterRequest $request,
        PushCareWaterAction  $action,
    ): array
    {
        $alertTimeId = $request->input('alertTimeId');
        $request->merge(['userId' => $alertTimeId]);
        return (array) $action($request);
    }

    /**
     * @param PushCareFertilizerRequest $request
     * @param PushCareFertilizerAction $action
     * @return array
     */
    public function pushFertilizer(
        PushCareFertilizerRequest $request,
        PushCareFertilizerAction  $action,
    ): array
    {
        $alertTimeId = $request->input('alertTimeId');
        $request->merge(['userId' => $alertTimeId]);
        return (array) $action($request);
    }
}
