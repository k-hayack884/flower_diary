<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingWrapDto
{
    public function __construct(
        public WaterSettingDto $waterSettings
    )
    {
    }
}
