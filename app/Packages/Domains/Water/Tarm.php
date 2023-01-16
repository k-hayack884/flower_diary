<?php

namespace App\Packages\Domains\Water;

use DomainException;

class Tarm
{
    public const RESET=[1,2,3,4,5,6,7,8,9,10,11,12];
    private array $months = [];

    public function __construct(array $months)
    {
        if (count($months) > 12) {
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
    public function update(array $months): Tarm
    {
        if (count($months) > 13) {
        throw new DomainException('月の数が１３個以上あります');
    }
        foreach ($months as $month) {
            if (!preg_match("/^[0-9]$|^1[0-2]$/", $month)) {
                throw new DomainException('その文字は使用できません');
            }
        }
        return new self($months);
    }
//    public function reset():Tarm
//    {
//        return new self(1,2,3,4,5,6,7,8,9,10,11,12);
//    }
}
