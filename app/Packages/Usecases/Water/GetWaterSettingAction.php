<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use App\Packages\Usecases\WaterSettingWrapDtoFactory;

class GetWaterSettingAction
{
    private WaterSettingRepositoryInterface $waterSettingRepository;
    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    /**
     * @param GetWaterSettingRequest $getWaterSettingRequest
     * @param string $waterSettingId
     * @return WaterSettingWrapDto
     */
    public function __invoke(
        GetWaterSettingRequest $getWaterSettingRequest,
        string                $waterSettingId
    ): WaterSettingWrapDto
    {
        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingId($waterSettingId));
        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
