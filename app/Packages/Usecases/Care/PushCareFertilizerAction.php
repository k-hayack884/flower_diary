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
use App\Packages\Usecases\Dto\Care\CareWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PushCareFertilizerAction
{
    /**
     * @var CommentRepositoryInterface
     */
    private CareFertilizerRepository $careRepository;

    /**
     * @param CareWaterRepository $careRepository
     */
    public function __construct(CareFertilizerRepository $careRepository,)
    {
        $this->careRepository = $careRepository;

    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        PushCareFertilizerRequest $getCareRequest,
    )
    {
        Log::info(__METHOD__, ['開始']);
        $alertTimeId = $getCareRequest->getAlertTimeId();
$this->careRepository->push($alertTimeId);

        Log::info(__METHOD__, ['終了']);
        Session::flash('successMessage', 'お世話ができました');

//        return new CareWrapDto($currentMonthCarePlantSettings);
    }
}
