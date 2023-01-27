<?php

namespace App\Packages\Usecases\Dto\Fertilizer;

class FertilizerSettingDto
{
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
