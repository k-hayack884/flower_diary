<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;

class WaterSettingsDtoFactory
{
    public static function create(TarmWaterSetting $waterSetting): WaterSettingWrapDto
    {
        return new WaterSettingWrapDto(
            new WaterSettingDto(
                $waterSetting->getWaterSettingId(),
                $waterSetting->getMonths(),
                $waterSetting->getWaterNote()->getNote(),
                $waterSetting->getWaterAmount()->getValue(),
                $waterSetting->getWateringTimes()->getValue(),
                $waterSetting->getWateringInterval()->getValue(),
                $waterSetting->getAlertTimes()
            )
        );
    }
}
