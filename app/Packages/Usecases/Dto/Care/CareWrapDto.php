<?php

namespace App\Packages\Usecases\Dto\Care;

class CareWrapDto
{
    public function __construct(
        public array $currentCare
    )
    {
    }
}
