<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingDto
{
    /**
     * @param string $fertilizerSettingId
     * @param array $months
     * @param string $note
     * @param int $fertilizerAmount
     * @param string $fertilizerName
     */
    public function __construct(
        public string $fertilizerSettingId,
        public array  $months,
        public string $note,
        public int    $fertilizerAmount,
        public string $fertilizerName
    )
    {
    }
}
