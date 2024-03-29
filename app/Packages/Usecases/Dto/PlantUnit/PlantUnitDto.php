<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitDto
{
    /**
     * @param string $plantUnitId
     * @param string $userId
     * @param string $plantId
     * @param string $checkSeatId
     * @param string $plantName
     * @param array $diaries
     * @param string $createDate
     * @param string $updateDate
     */
    public function __construct(
        public string $plantUnitId,
        public string $plantId,
        public string $userId,
        public string $checkSeatId,
        public string $plantName,
        public string $plantImage,
        public array $diaries,
        public string $createDate,
        public string $updateDate,
    )
    {
    }
}
