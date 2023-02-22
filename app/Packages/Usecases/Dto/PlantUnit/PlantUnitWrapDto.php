<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitWrapDto
{
    /**
     * @param PlantUnitDto $plantUnit
     */
    public function __construct(
        public PlantUnitDto $plantUnit
    )
    {
    }
}
