<?php

namespace App\Packages\Usecases\Dto\CheckSeat;

class CheckSeatDto
{
    /**
     * @param string $checkSeatId
     * @param array $waterSettingIds
     * @param array $fertilizerSettingIds
     */
    public function __construct(
        public string $checkSeatId,
        public array  $waterSettingIds,
        public array  $fertilizerSettingIds
    )
    {
    }
}
