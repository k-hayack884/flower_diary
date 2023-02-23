<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingsWrapDto
{
    /**
     * @param array $fertilizerSettings
     */
    public function __construct(
        public array $fertilizerSettings
    )
    {
    }
}
