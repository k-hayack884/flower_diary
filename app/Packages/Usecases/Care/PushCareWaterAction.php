<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Infrastructures\Care\CareWaterRepository;
use App\Packages\Presentations\Requests\Care\PushCareWaterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PushCareWaterAction
{
    /**
     * @var CareWaterRepository
     */
    private CareWaterRepository $careRepository;

    /**
     * @param CareWaterRepository $careRepository
     */
    public function __construct(CareWaterRepository $careRepository,)
    {
        $this->careRepository = $careRepository;
    }

    /**
     * @param PushCareWaterRequest $getCareRequest
     * @return JsonResponse
     */
    public function __invoke(
        PushCareWaterRequest $getCareRequest,
    ): JsonResponse
    {
        Log::info(__METHOD__, ['開始']);
        $alertTimeId = $getCareRequest->getAlertTimeId();
        $this->careRepository->push($alertTimeId);

        Log::info(__METHOD__, ['終了']);
        Session::flash('successMessage', 'お世話ができました');

        return response()->json([
            'successMessage' => 'お世話ができました',
        ]);
    }
}
