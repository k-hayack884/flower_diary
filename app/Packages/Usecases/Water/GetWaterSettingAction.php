<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingID;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
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
     * @param GetWaterSettingAction $getWaterSettingAction
     * @param string $waterSettingId
     * @return WaterSettingWrapDto
     */
    public function __invoke(
        GetWaterSettingAction $getWaterSettingAction,
        string                $waterSettingId
    ): WaterSettingWrapDto
    {
        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingID($waterSettingId));
        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
