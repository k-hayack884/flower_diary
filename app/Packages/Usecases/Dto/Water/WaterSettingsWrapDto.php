<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingsWrapDto
{
    public function __construct(
        public array $waterSettings
    )
    {
    }
}
