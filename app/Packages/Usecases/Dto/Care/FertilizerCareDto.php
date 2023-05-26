<?php

namespace App\Packages\Usecases\Dto\Care;

class FertilizerCareDto
{
    /**
     * @param string $alertTimeId
     * @param string $plantName
     * @param string $fertilizerAmount
     * @param string $fertilizerNote
     * @param string $fertilizerName
     * @param string $alertMonth
     */
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
