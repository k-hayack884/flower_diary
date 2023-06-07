<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Infrastructures\Care\CareFertilizerRepository;
use App\Packages\Presentations\Requests\Care\PushCareFertilizerRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
