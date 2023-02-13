<?php

namespace App\Packages\Usecases\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatDto;
use App\Packages\Usecases\Dto\CheckSeat\CheckSeatWrapDto;

class CheckSeatDtoFactory
{
    public static function create(CheckSeat $checkSeat): CheckSeatDto
    {
        return new CheckSeatDto(
            $checkSeat->getCheckSeatId()->getId(),
            $checkSeat->getWaterSettingIds(),
            $checkSeat->getFertilizerSettingIds()
        );
    }
}
