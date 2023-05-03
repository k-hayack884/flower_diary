<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareFertilizerRepository;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\Presentations\Requests\Care\GetCareFertilizerRequest;
use App\Packages\Presentations\Requests\Care\GetCareWaterRequest;
use App\Packages\Usecases\Dto\Care\WaterCaresWrapDto;
use Illuminate\Support\Facades\Log;

class GetCareFertilizerAction
{

    private CareFertilizerRepository $careRepository;

    /**
     * @param CareFertilizerRepository $careRepository
     */
    public function __construct(CareFertilizerRepository $careRepository)
    {
        $this->careRepository = $careRepository;

    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        GetCareFertilizerRequest $getCareRequest,
    )
    {
        Log::info(__METHOD__, ['開始']);
        $userId = $getCareRequest->getUserId();
        $hitPlantUnits=$this->careRepository->findCareByUser(new UserId($userId));
//        $hitPlantUnits = $this->plantUnitRepository->findByUser(new UserId($userId));
//
//        foreach ($hitPlantUnits as $plantUnit) {
//            if (!empty($this->careRepository->find($plantUnit->getCheckSeatId()))) {
//                $currentMonthCarePlantSettings = $this->careRepository->find($plantUnit->getCheckSeatId());
//                foreach ($currentMonthCarePlantSettings as $currentMonthCarePlantSetting) {
//                    foreach ($currentMonthCarePlantSetting as $hoge){
//                        $hoge->plant_name =$plantUnit->getPlantName()->getvalue() ;
//                        $todayCare[] = $hoge;
//                    }
//                }
//            }
//        }
//dd($todayCare);
        Log::info(__METHOD__, ['終了']);
//        return $todayCare;
//        return new WaterCaresWrapDto($currentMonthCarePlantSettings);
    }
}
