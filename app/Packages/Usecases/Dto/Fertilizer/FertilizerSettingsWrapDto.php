<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingsWrapDto
{
    public function __construct(
        public array $fertilizerSettings
    )
    {
    }
}
