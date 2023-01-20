<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingDto
{
    public function __construct(
        public string $waterSettingId,
        public array  $months,
        public string $note,
        public string $WaterAmount,
        public int    $wateringTimes,
        public int    $wateringInterval,
        public array  $alertTimes
    )
    {
    }
}
