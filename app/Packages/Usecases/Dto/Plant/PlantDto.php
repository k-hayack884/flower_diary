<?php

namespace App\Packages\Usecases\Dto\Plant;

class PlantDto
{
    /**
     * @param string $plantId
     * @param string $name
     * @param string $scientific
     * @param string $information
     * @param int $recommendSpringWaterInterval
     * @param int $recommendSpringWaterTimes
     * @param int $recommendSummerWaterInterval
     * @param int $recommendSummerWaterTimes
     * @param int $recommendAutumnWaterInterval
     * @param int $recommendAutumnWaterTimes
     * @param int $recommendWinterWaterInterval
     * @param int $recommendWinterWaterTimes
     * @param string $fertilizerName
     * @param array $fertilizerMonths
     * @param array $plantImages
     */
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
        public array  $plantImages,
    )
    {
    }
}
