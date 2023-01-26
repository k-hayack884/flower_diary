<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingDto;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;

class FertilizerSettingsDtoFactory
{
    public static function create(MonthsFertilizerSetting $fertilizerSetting): FertilizerSettingWrapDto
    {
        return new FertilizerSettingWrapDto(
            new FertilizerSettingDto(
                $fertilizerSetting->getFertilizerSettingId(),
                $fertilizerSetting->getMonths(),
                $fertilizerSetting->getFertilizerNote()->getvalue(),
                $fertilizerSetting->getFertilizerAmount()->getValue(),
                $fertilizerSetting->getFertilizerName()->getValue(),
            )
        );
    }
}
