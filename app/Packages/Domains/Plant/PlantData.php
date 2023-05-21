<?php

namespace App\Packages\Domains\Plant;

class PlantData
{
    public function __construct(
        private PlantId $plantId,
        private string $name,
        private string $scientific,
        private string $information,
        private int    $recommendSpringWaterInterval,
        private int    $recommendSpringWaterTimes,
        private int    $recommendSummerWaterInterval,
        private int    $recommendSummerWaterTimes,
        private int    $recommendAutumnWaterInterval,
        private int    $recommendAutumnWaterTimes,
        private int    $recommendWinterWaterInterval,
        private int    $recommendWinterWaterTimes,
        private string $fertilizerName,
        private array  $fertilizerMonths,
        private ?plantImages $plantImages
    )
    {
    }

    /**
     * @return PlantId
     */
    public function getPlantId(): PlantId
    {
        return $this->plantId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getScientific(): string
    {
        return $this->scientific;
    }

    /**
     * @return string
     */
    public function getInformation(): string
    {
        return $this->information;
    }

    /**
     * @return int
     */
    public function getRecommendSpringWaterInterval(): int
    {
        return $this->recommendSpringWaterInterval;
    }

    /**
     * @return int
     */
    public function getRecommendSpringWaterTimes(): int
    {
        return $this->recommendSpringWaterTimes;
    }

    /**
     * @return int
     */
    public function getRecommendSummerWaterInterval(): int
    {
        return $this->recommendSummerWaterInterval;
    }

    /**
     * @return int
     */
    public function getRecommendSummerWaterTimes(): int
    {
        return $this->recommendSummerWaterTimes;
    }
    /**
     * @return int
     */
    public function getRecommendAutumnWaterInterval(): int
    {
        return $this->recommendAutumnWaterInterval;
    }

    /**
     * @return int
     */
    public function getRecommendAutumnWaterTimes(): int
    {
        return $this->recommendAutumnWaterTimes;
    }

    /**
     * @return int
     */
    public function getRecommendWinterWaterInterval(): int
    {
        return $this->recommendWinterWaterInterval;
    }

    /**
     * @return int
     */
    public function getRecommendWinterWaterTimes(): int
    {
        return $this->recommendWinterWaterTimes;
    }

    /**
     * @return string
     */
    public function getFertilizerName(): string
    {
        return $this->fertilizerName;
    }

    /**
     * @return array
     */
    public function getFertilizerMonths(): array
    {
        return $this->fertilizerMonths;
    }

    /**
     * @return plantImages|null
     */
    public function getPlantImages(): ?plantImages
    {
        return $this->plantImages;
    }
}
