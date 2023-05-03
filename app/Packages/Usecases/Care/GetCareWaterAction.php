<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\Presentations\Requests\Care\GetCareWaterRequest;
use App\Packages\Usecases\Dto\Care\WaterCareDto;
use App\Packages\Usecases\Dto\Care\WaterCaresWrapDto;
use Illuminate\Support\Facades\Log;

class GetCareWaterAction
{
    private CareWaterRepository $careRepository;

    /**
     * @param CareWaterRepository $careRepository
     */
    public function __construct(CareWaterRepository          $careRepository,)
    {
        $this->careRepository = $careRepository;

    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        GetCareWaterRequest $getCareRequest,
    ):WaterCaresWrapDto
    {
        Log::info(__METHOD__, ['開始']);
        $userId = $getCareRequest->getUserId();
        $hitCares = $this->careRepository->findCareByUser(new UserId($userId));
        $careDtos=[];

        foreach ($hitCares as $hitCare) {
            $careDtos[]=new WaterCareDto(
                $hitCare->getAlertTimeId()->getId(),
                $hitCare->getPlantName()->getvalue(),
                $hitCare->getWaterAmount()->getvalue(),
                $hitCare->getWaterNote()->getvalue(),
                $hitCare->getAlertTime(),
            );
        }

//dd($todayCare);
        Log::info(__METHOD__, ['終了']);
        return new WaterCaresWrapDto($careDtos);

    }
}