<?php

namespace App\Packages\Domains\Plant;

class PlantImages
{
    /**
     * @var PlantId
     */
    private PlantId $plantId;
    /**
     * @var array
     */
    private array $plantImages;

    public function __construct(PlantId $plantId, array $plantImages)
    {
        $this->plantId = $plantId;
        $this->plantImages = $plantImages;

    }

    /**
     * @return PlantId
     */
    public function getPlantId(): PlantId
    {
        return $this->plantId;
    }

    /**
     * @return array
     */
    public function getPlantImages(): array
    {
        return $this->plantImages;
    }
}
