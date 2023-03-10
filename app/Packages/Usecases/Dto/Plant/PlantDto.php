<?php

namespace App\Packages\Usecases\Dto\Plant;

class PlantDto
{
    public function __construct(
        public string $plantId,
        public string $name,
        public string $scientific,
        public string $information,
        public int    $recommendSpringWaterInterval,
        public int    $recommendSpringWaterTimes,
        public int    $recommendSummerWaterInterval,
        public int    $recommendSummerWaterTimes,
        public int    $recommendAutumnWaterInterval,
        public int    $recommendAutumnWaterTimes,
        public int    $recommendWinterWaterInterval,
        public int    $recommendWinterWaterTimes,
        public string $fertilizerName,
        public array  $fertilizerMonths,
    )
    {
    }
}
