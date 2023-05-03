<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\Presentations\Requests\Care\GetCareWaterRequest;
use App\Packages\Presentations\Requests\Care\PushCareWaterRequest;
use App\Packages\Usecases\Dto\Care\WaterCaresWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PushCareWaterAction
{
    /**
     * @var CommentRepositoryInterface
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
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        PushCareWaterRequest $getCareRequest,
    )
    {
        Log::info(__METHOD__, ['開始']);
        $alertTimeId = $getCareRequest->getAlertTimeId();
$this->careRepository->push($alertTimeId);

//dd($todayCare);
        Log::info(__METHOD__, ['終了']);
        Session::flash('successMessage', 'お世話ができました');

//        return new WaterCaresWrapDto($currentMonthCarePlantSettings);
    }
}
