<?php

namespace App\Packages\Domains\Care;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterNote;

class FertilizerCare
{
    private FertilizerAlertTimeId $alertTimeId;
    private PlantName $plantName;
    private FertilizerAmount $fertilizerAmount;
    private FertilizerNote $fertilizerNote;
    private FertilizerName $fertilizerName;
    private string $alertMonth;

    public function __construct(FertilizerAlertTimeId $alertTimeId, PlantName $plantName,FertilizerAmount $fertilizerAmount, FertilizerNote $fertilizerNote,FertilizerName $fertilizerName, string $alertMonth)
    {
        $this->alertTimeId = $alertTimeId;
        $this->plantName = $plantName;
        $this->fertilizerAmount = $fertilizerAmount;
        $this->fertilizerNote = $fertilizerNote;
        $this->fertilizerName= $fertilizerName;
        $this->alertMonth = $alertMonth;
    }


    public function getAlertTimeId(): FertilizerAlertTimeId
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
     * @return FertilizerAmount
     */
    public function getFertilizerAmount(): FertilizerAmount
    {
        return $this->fertilizerAmount;
    }

    /**
     * @return FertilizerNote
     */
    public function getFertilizerNote(): FertilizerNote
    {
        return $this->fertilizerNote;
    }

    /**
     * @return fertilizerName
     */
    public function getFertilizerName(): fertilizerName
    {
        return $this->fertilizerName;
    }

    /**
     * @return string
     */
    public function getAlertMonth(): string
    {
        return $this->alertMonth;
    }
}
