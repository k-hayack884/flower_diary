<?php

namespace App\Packages\Domains\Plant;

class Plant
{
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
