<?php

namespace App\Packages\Usecases\Dto\PlantUnit;

class PlantUnitDetailDto
{
    /**
     * @param string $plantUnitId
     * @param string $plantId
     * @param string $userId
     * @param string $checkSeatId
     * @param string $plantNickName
     * @param string $plantImage
     * @param array $diaries
     * @param string $createDate
     * @param string $updateDate
     * @param string $plantName
     * @param string $scientific
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
