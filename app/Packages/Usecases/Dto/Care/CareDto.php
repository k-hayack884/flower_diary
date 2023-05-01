<?php

namespace App\Packages\Usecases\Dto\Care;

class CareDto
{
    public function __construct(
        public string $waterSettingId,
        public array  $months,
        public string $note,
        public string $waterAmount,
        public int    $wateringTimes,
        public int    $wateringInterval,
        public array  $alertTimes,
        public string $alertTimeId,
        public string $alertTime,
        public string $resentCareTime,
    )
    {
    }
}
