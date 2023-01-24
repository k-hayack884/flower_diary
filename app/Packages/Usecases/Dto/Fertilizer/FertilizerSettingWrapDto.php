<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingWrapDto
{
    public function __construct(
        public FertilizerSettingDto $waterSettings
    )
    {
    }
}
