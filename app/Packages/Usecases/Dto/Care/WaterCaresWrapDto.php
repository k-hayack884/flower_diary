<?php

namespace App\Packages\Usecases\Dto\Care;

class WaterCaresWrapDto
{
    /**
     * @param array $waterCares
     */
    public function __construct(
        public array $waterCares
    )
    {
    }
}
