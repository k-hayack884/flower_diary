<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;

class GetFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
    private FertilizerRepositoryInterface $fertilizerRepository;
    /**
     * @param FertilizerRepositoryInterface $fertilizerRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerRepository)
    {
        $this->fertilizerRepository = $fertilizerRepository;
    }

    /**
     * @param GetFertilizerSettingRequest $getFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */
    public function __invoke(
        GetFertilizerSettingRequest $getFertilizerSettingRequest,
    ): FertilizerSettingWrapDto
    {
        $fertilizerSettingId=$getFertilizerSettingRequest->getId();
        $fertilizerSetting = $this->fertilizerRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
