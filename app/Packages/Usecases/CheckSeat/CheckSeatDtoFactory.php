<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;

class CheckSeatDtoFactory
{
    public static function create(CheckSeat $checkSeat): CheckSeatDto
    {
        $waterSettingIds = [];
        $fertilizerSettingIds = [];
        $waterSettingCollection = $checkSeat->getWaterSettingCollection();
        $fertilizerSettingCollection = $checkSeat->getFertilizerSettingCollection();
        foreach ($waterSettingCollection as $waterSetting) {
            $waterSettingIds[] = $waterSetting->getWaterSettingId()->getId();
        }
        foreach ($fertilizerSettingCollection as $fertilizerSetting) {
            $fertilizerSettingIds[] = $fertilizerSetting->getFertilizerSettingId()->getId();
        }
        return new CheckSeatDto(
            $checkSeat->getCheckSeatId()->getId(),
            $waterSettingIds,
            $fertilizerSettingIds
        );
    }
}
