<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingID;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use App\Packages\Usecases\WaterSettingWrapDtoFactory;

class GetWaterSettingAction
{
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    public function __invoke(
        GetWaterSettingAction $getWaterSettingAction,
        string                $waterSettingId
    ): WaterSettingWrapDto
    {
        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingID($waterSettingId));
        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
