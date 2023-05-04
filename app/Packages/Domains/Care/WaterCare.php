<?php

namespace App\Packages\Domains\Care;

use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterNote;

class WaterCare
{
    private WaterAlertTimeId $alertTimeId;
    private PlantName $plantName;
    private WaterAmount $waterAmount;
    private WaterNote $waterNote;
    private string $alertTime;

    public function __construct(WaterAlertTimeId $alertTimeId, PlantName $plantName, WaterAmount $waterAmount, WaterNote $waterNote, string $alertTime)
    {
        $this->alertTimeId = $alertTimeId;
        $this->plantName = $plantName;
        $this->waterAmount = $waterAmount;
        $this->waterNote = $waterNote;
        $this->alertTime = $alertTime;
    }

    /**
     * @return WaterAlertTimeId
     */
    public function getAlertTimeId(): WaterAlertTimeId
    {
        return $this->alertTimeId;
    }

    /**
     * @return plantName
     */
    public function getPlantName(): plantName
    {
        return $this->plantName;
    }

    /**
     * @return WaterAmount
     */
    public function getWaterAmount(): WaterAmount
    {
        return $this->waterAmount;
    }

    /**
     * @return WaterNote
     */
    public function getWaterNote(): WaterNote
    {
        return $this->waterNote;
    }

    /**
     * @return string
     */
    public function getAlertTime(): string
    {
        return $this->alertTime;
    }
}
