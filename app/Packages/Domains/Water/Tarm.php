<?php

namespace App\Packages\Domains\Water;

use DomainException;

class Tarm
{
    private array $months = [];

    public function __construct(int ...$months)
    {
        if (count($months) > 13) {
            throw new DomainException('月の数が１３個以上あります');
        }

        foreach ($months as $month) {
            if (!preg_match("/^[0-9]$|^1[0-2]$/", $month)) {
                throw new DomainException('その文字は使用できません');
            }
        }
        $this->months = $months;
    }

    /**
     * @return array
     */
    public function getMonths(): array
    {
        return $this->months;
    }
}
