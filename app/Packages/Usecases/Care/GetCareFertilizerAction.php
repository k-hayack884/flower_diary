<?php

namespace App\Packages\Usecases\Care;


use App\Packages\Domains\User\UserId;
use App\Packages\Infrastructures\Care\CareFertilizerRepository;
use App\Packages\Presentations\Requests\Care\GetCareFertilizerRequest;
use App\Packages\Usecases\Dto\Care\FertilizerCareDto;
use App\Packages\Usecases\Dto\Care\FertilizerCaresWrapDto;
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
     * @param GetCareFertilizerRequest $getCareRequest
     * @return FertilizerCaresWrapDto
     */
    public function __invoke(
        GetCareFertilizerRequest $getCareRequest,
    ):FertilizerCaresWrapDto
    {
        Log::info(__METHOD__, ['開始']);
        $userId = $getCareRequest->getUserId();
        $hitCares=$this->careRepository->findCareByUser(new UserId($userId));
        $careDtos=[];
        foreach ($hitCares as $hitCare) {
            $careDtos[]=new FertilizerCareDto(
                $hitCare->getAlertTimeId()->getId(),
                $hitCare->getPlantName()->getvalue(),
                $hitCare->getFertilizerAmount()->getvalue(),
                $hitCare->getFertilizerNote()->getvalue(),
                $hitCare->getFertilizerName()->getvalue(),
                $hitCare->getAlertMonth(),
            );
        }
        Log::info(__METHOD__, ['終了']);
        return new FertilizerCaresWrapDto($careDtos);
    }
}
