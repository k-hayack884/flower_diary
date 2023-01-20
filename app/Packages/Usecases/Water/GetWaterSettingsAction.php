<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Dto\Water\WaterSettingsWrapDto;

class GetWaterSettingsAction
{
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }


    public function __invoke(GetWaterSettingRequest $getWaterSettingRequest
    ): WaterSettingsWrapDto
    {
        $waterSettingCollection = $this->waterSettingRepository->find();
        $waterSettingDtos = [];

        foreach ($waterSettingCollection as $waterSetting) {
            $waterSettingDtos[] = new WaterSettingDto(
                $waterSetting->getWaterSettingId(),
                $waterSetting->getMonths(),
                $waterSetting->getWaterAmount()->getValue(),
                $waterSetting->getWaterNote()->getNote(),
                $waterSetting->getWateringTimes()->getValue(),
                $waterSetting->getWateringInterval()->getValue(),
                $waterSetting->getAlertTimes()
            );
        }
        return new WaterSettingsWrapDto($waterSettingDtos);
    }
}
