<?php

namespace App\Packages\Usecases\Dto\Care;

class WaterCareDto
{
    public function __construct(
        public string $alertTimeId,
        public string  $plantName,
        public string $waterAmount,
        public string $note,
        public string    $alertTime,
    )
    {
    }
}
