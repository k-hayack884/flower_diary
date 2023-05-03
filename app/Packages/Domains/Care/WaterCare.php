<?php

namespace App\Packages\Domains\Care;

use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterNote;

class WaterCare
{
    private WaterAlertTimeId $alertTimeId;
    private PlantName $plantName;
    private WaterAmount $amount;
    private WaterNote $note;
    private string $alertTime;

    public function __construct(WaterAlertTimeId $alertTimeId, PlantName $plantName, WaterAmount $amount, WaterNote $note, string $alertTime)
    {
        $this->alertTimeId = $alertTimeId;
        $this->plantName = $plantName;
        $this->amount = $amount;
        $this->note = $note;
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
    public function getAmount(): WaterAmount
    {
        return $this->amount;
    }

    /**
     * @return WaterNote
     */
    public function getNote(): WaterNote
    {
        return $this->note;
    }

    /**
     * @return string
     */
    public function getAlertTime(): string
    {
        return $this->alertTime;
    }
}
