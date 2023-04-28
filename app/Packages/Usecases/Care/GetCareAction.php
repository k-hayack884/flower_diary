<?php

namespace App\Packages\Usecases\Care;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Care\CareRepository;
use App\Packages\Presentations\Requests\Care\GetCareRequest;
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
    public function __construct(CareRepository $careRepository,
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
        foreach ($hitPlantUnits as $plantUnit){
            $are[]=$this->careRepository->find($plantUnit->getCheckSeatId());
        }


        Log::info(__METHOD__, ['終了']);

//        return CareDtoFactory::create($getCommentRequest);
    }
}
