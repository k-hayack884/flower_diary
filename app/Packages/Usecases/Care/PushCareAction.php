<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareRepository;
use App\Packages\Presentations\Requests\Care\GetCareRequest;
use App\Packages\Presentations\Requests\Care\PushCareRequest;
use App\Packages\Usecases\Dto\Care\CareWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PushCareAction
{
    /**
     * @var CommentRepositoryInterface
     */
    private CareRepository $careRepository;

    /**
     * @param CareRepository $careRepository
     */
    public function __construct(CareRepository               $careRepository,)
    {
        $this->careRepository = $careRepository;

    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        PushCareRequest $getCareRequest,
    )
    {
        Log::info(__METHOD__, ['開始']);
        $alertTimeId = $getCareRequest->getAlertTimeId();
$this->careRepository->push($alertTimeId);

//dd($todayCare);
        Log::info(__METHOD__, ['終了']);
        Session::flash('successMessage', 'お世話ができました');

//        return new CareWrapDto($currentMonthCarePlantSettings);
    }
}
