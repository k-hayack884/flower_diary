<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingWrapDto
{
    /**
     * @param FertilizerSettingDto $fertilizerSetting
     */
    public function __construct(
        public FertilizerSettingDto $fertilizerSetting
    )
    {
    }
}
