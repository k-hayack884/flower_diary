<?php

namespace App\Packages\Usecases\Dto\Water;

class WaterSettingWrapDto
{
    /**
     * @param WaterSettingDto $waterSetting
     */
    public function __construct(
        public WaterSettingDto $waterSetting
    )
    {
    }
}
