<?php

namespace App\Packages\Usecases\Dto\CheckSeat;

class CheckSeatDto
{
    public function __construct(
        public string $checkSeatId,
        public array  $waterSettingIds,
        public array  $fertilizerSettingIds
    )
    {
    }
}
