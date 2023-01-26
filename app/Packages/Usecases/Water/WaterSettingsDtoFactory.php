<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;

class WaterSettingsDtoFactory
{
    /**
     * @param MonthsWaterSetting $waterSetting
     * @return WaterSettingWrapDto
     */
    public static function create(MonthsWaterSetting $waterSetting): WaterSettingWrapDto
    {
        return new WaterSettingWrapDto(
            new WaterSettingDto(
                $waterSetting->getWaterSettingId()->getId(),
                $waterSetting->getMonths(),
                $waterSetting->getWaterNote()->getValue(),
                $waterSetting->getWaterAmount()->getValue(),
                $waterSetting->getWateringTimes()->getValue(),
                $waterSetting->getWateringInterval()->getValue(),
                $waterSetting->getAlertTimes()
            )
        );
    }
}
