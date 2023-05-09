<?php

namespace App\Packages\Domains\Plant;

class PlantImages
{
    private PlantId $plantId;
    private string $plantImage1;
    private string $plantImage2;
    private string $plantImage3;
    private string $plantImage4;
    private string $plantImage5;

    public function __construct(PlantId $plantId, string $plantImage1, string $plantImage2, string $plantImage3, string $plantImage4, string $plantImage5)
    {
        $this->plantId = $plantId;
        $this->plantImage1 = $plantImage1;
        $this->plantImage2 = $plantImage2;
        $this->plantImage3 = $plantImage3;
        $this->plantImage4 = $plantImage4;
        $this->plantImage5 = $plantImage5;
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
    public function getPlantImage1(): string
    {
        return $this->plantImage1;
    }

    /**
     * @return string
     */
    public function getPlantImage2(): string
    {
        return $this->plantImage2;
    }

    /**
     * @return string
     */
    public function getPlantImage3(): string
    {
        return $this->plantImage3;
    }

    /**
     * @return string
     */
    public function getPlantImage4(): string
    {
        return $this->plantImage4;
    }

    /**
     * @return string
     */
    public function getPlantImage5(): string
    {
        return $this->plantImage5;
    }
}
