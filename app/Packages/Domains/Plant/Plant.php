<?php

namespace App\Packages\Domains\Plant;

class Plant
{
    /**
     * @var PlantId
     * @var string $name
     * @var string $scientific
     * @var string $information
     * @var int $recommendSpringWaterInterval
     * @var int $recommendSpringWaterTimes
     * @var int $recommendSummerWaterInterval
     * @var int $recommendSummerWaterTimes
     * @var int $recommendAutumnWaterInterval
     * @var int $recommendAutumnWaterTimes
     * @var int $recommendWinterWaterInterval
     * @var int $recommendWinterWaterTimes
     * @var string $fertilizerName
     * @var string $fertilizerMonths
     *
     */
    private PlantId $plantId;
    private string $name;
    private string $scientific;
    private string $information;
    private int $recommendSpringWaterInterval;
    private int $recommendSpringWaterTimes;
    private int $recommendSummerWaterInterval;
    private int $recommendSummerWaterTimes;
    private int $recommendAutumnWaterInterval;
    private int $recommendAutumnWaterTimes;
    private int $recommendWinterWaterInterval;
    private int $recommendWinterWaterTimes;
    private string $fertilizerName;
    private array $fertilizerMonths;
}
