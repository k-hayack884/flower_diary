<?php

namespace App\Packages\Usecases\Dto\Care;

class FertilizerCaresWrapDto
{
    /**
     * @param array $fertilizerCares
     */
    public function __construct(
        public array $fertilizerCares
    )
    {
    }
}
