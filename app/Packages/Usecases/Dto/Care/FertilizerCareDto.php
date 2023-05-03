<?php

namespace App\Packages\Usecases\Dto\Care;

class FertilizerCareDto
{
    public function __construct(
        public string $alertTimeId,
        public string  $plantName,
        public string $fertilizerAmount,
        public string $fertilizerNote,
        public string $fertilizerName,
        public string    $alertMonth,
    )
    {
    }
}
