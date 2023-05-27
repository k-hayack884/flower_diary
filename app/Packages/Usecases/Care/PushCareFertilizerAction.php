<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareFertilizerRepository;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\Presentations\Requests\Care\GetCareWaterRequest;
use App\Packages\Presentations\Requests\Care\PushCareFertilizerRequest;
use App\Packages\Presentations\Requests\Care\PushCareWaterRequest;
use App\Packages\Usecases\Dto\Care\WaterCaresWrapDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PushCareFertilizerAction
{
    /**
     * @var CareFertilizerRepository
     */
    private CareFertilizerRepository $careRepository;

    /**
     * @param CareFertilizerRepository $careRepository
     */
    public function __construct(CareFertilizerRepository $careRepository,)
    {
        $this->careRepository = $careRepository;
    }

    /**
     * @param PushCareFertilizerRequest $getCareRequest
     * @return JsonResponse
     */
    public function __invoke(
        PushCareFertilizerRequest $getCareRequest,
    ): JsonResponse
    {
        Log::info(__METHOD__, ['開始']);
        $alertTimeId = $getCareRequest->getAlertTimeId();
        $this->careRepository->push($alertTimeId);

        Log::info(__METHOD__, ['終了']);
        return response()->json([
            'successMessage' => 'お世話ができました',
        ]);
    }
}
