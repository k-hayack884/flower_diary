<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingWrapDto
{
    /**
     * @param WaterSettingDto $waterSettings
     */
    public function __construct(
        public WaterSettingDto $waterSettings
    )
    {
    }
}
