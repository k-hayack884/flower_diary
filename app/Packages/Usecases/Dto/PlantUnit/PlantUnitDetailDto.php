<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitDetailDto
{
    /**
     * @param string $plantUnitId
     * @param string $userId
     * @param string $plantId
     * @param string $checkSeatId
     * @param string $plantNickName
     * @param array $diaries
     * @param string $createDate
     * @param string $updateDate
     */
    public function __construct(
        public string $plantUnitId,
        public string $plantId,
        public string $userId,
        public string $checkSeatId,
        public string $plantNickName,
        public string $plantImage,
        public array $diaries,
        public string $createDate,
        public string $updateDate,
        public string $plantName,
        public string $scientific,



    )
    {
    }
}
