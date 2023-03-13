<?php

namespace App\Packages\Usecases\Dto\Plant;

class PlantWrapDto
{
    /**
     * @param PlantDto $plant
     */
    public function __construct(
        public PlantDto $plant
    )
    {
    }
}
