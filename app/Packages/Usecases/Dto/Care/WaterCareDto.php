<?php

namespace App\Packages\Usecases\Dto\Care;

class WaterCareDto
{
    /**
     * @param string $alertTimeId
     * @param string $plantName
     * @param string $waterAmount
     * @param string $waternote
     * @param string $alertTime
     */
    public function __construct(
        public string $alertTimeId,
        public string  $plantName,
        public string $waterAmount,
        public string $waternote,
        public string    $alertTime,
    )
    {
    }
}
