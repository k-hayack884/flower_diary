<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingsWrapDto
{
    /**
     * @param array $waterSettings
     */
    public function __construct(
        public array $waterSettings
    )
    {
    }
}
