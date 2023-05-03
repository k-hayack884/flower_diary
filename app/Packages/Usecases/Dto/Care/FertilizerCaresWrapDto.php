<?php

namespace App\Packages\Usecases\Dto\Care;

class FertilizerCaresWrapDto
{
    public function __construct(
        public array $fertilizerCares
    )
    {
    }
}
