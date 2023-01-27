<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingDto
{
    /**
     * @param string $waterSettingId
     * @param array $months
     * @param string $note
     * @param string $waterAmount
     * @param int $wateringTimes
     * @param int $wateringInterval
     * @param array $alertTimes
     */
    public function __construct(
        public string $waterSettingId,
        public array  $months,
        public string $note,
        public string $waterAmount,
        public int    $wateringTimes,
        public int    $wateringInterval,
        public array  $alertTimes
    )
    {
    }
}
