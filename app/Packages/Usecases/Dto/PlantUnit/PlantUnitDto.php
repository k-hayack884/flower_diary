<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitDto
{
    public function __construct(
        public string $plantUnitId,
        public string $userId,
        public string $plantId,
        public string $checkSeatId,
        public string $plantName,
        public array $diaries,
        public string $createDate,
        public string $updateDate,
    )
    {
    }
}
