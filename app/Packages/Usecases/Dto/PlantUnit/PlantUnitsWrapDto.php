<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitsWrapDto
{
    /**
     * @param array $plantUnits
     */
    public function __construct(
        public array $plantUnits
    )
    {
    }
}
