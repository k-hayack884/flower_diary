<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitWrapDto
{
    public function __construct(
        public PlantUnitDto $plantUnit
    )
    {
    }
}
