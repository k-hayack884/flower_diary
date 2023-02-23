<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\GetWaterSettingsRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Dto\Water\WaterSettingsWrapDto;

class GetWaterSettingsAction
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
     * @param GetWaterSettingsRequest $getWaterSettingRequest
     * @return WaterSettingsWrapDto
     */
    public function __invoke(GetWaterSettingsRequest $getWaterSettingRequest
    ): WaterSettingsWrapDto
    {
        $waterSettingCollection = $this->waterSettingRepository->find();
        $waterSettingDtos = [];

        foreach ($waterSettingCollection as $waterSetting) {
            $waterSettingDtos[] = new WaterSettingDto(
                $waterSetting->getWaterSettingId()->getId(),
                $waterSetting->getMonths(),
                $waterSetting->getWaterAmount()->getValue(),
                $waterSetting->getWaterNote()->getValue(),
                $waterSetting->getWateringTimes()->getValue(),
                $waterSetting->getWateringInterval()->getValue(),
                $waterSetting->getAlertTimes()
            );
        }
        return new WaterSettingsWrapDto($waterSettingDtos);
    }
}
