<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareRepository;
use App\Packages\Presentations\Requests\Care\GetCareRequest;
use App\Packages\Usecases\Dto\Care\CareWrapDto;
use Illuminate\Support\Facades\Log;

class GetCareAction
{
    /**
     * @var CommentRepositoryInterface
     */
    private CareRepository $careRepository;

    /**
     * @param CareRepository $careRepository
     */
    public function __construct(CareRepository               $careRepository,
                                PlantUnitRepositoryInterface $plantUnitRepository)
    {
        $this->careRepository = $careRepository;
        $this->plantUnitRepository = $plantUnitRepository;

    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        GetCareRequest $getCareRequest,
    )
    {
        Log::info(__METHOD__, ['開始']);
        $userId = $getCareRequest->getUserId();
        $hitPlantUnits = $this->plantUnitRepository->findByUser(new UserId($userId));

        foreach ($hitPlantUnits as $plantUnit) {
            if (!empty($this->careRepository->find($plantUnit->getCheckSeatId()))) {
                $currentMonthCarePlantSettings = $this->careRepository->find($plantUnit->getCheckSeatId());
                foreach ($currentMonthCarePlantSettings as $currentMonthCarePlantSetting) {
                    foreach ($currentMonthCarePlantSetting as $hoge){
                        $hoge->plant_name =$plantUnit->getPlantName()->getvalue() ;
                        $todayCare[] = $hoge;
                    }
                }
            }
        }
//dd($todayCare);
        Log::info(__METHOD__, ['終了']);
        return $todayCare;
//        return new CareWrapDto($currentMonthCarePlantSettings);
    }
}
