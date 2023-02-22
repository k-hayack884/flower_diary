<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingWrapDto
{
    /**
     * @param FertilizerSettingDto $fertilizerSettings
     */
    public function __construct(
        public FertilizerSettingDto $fertilizerSettings
    )
    {
    }
}
