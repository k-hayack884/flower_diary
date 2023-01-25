<?php

namespace App\Packages\Domains\Water;

class WateringInterval
{
    public const RESET=1;
    private int $wateringInterval;

    /**
     * @param int $wateringInterval
     */
    public function __construct(int $wateringInterval)
    {
        if($wateringInterval<1 || $wateringInterval>365){
            throw new DomainException('水やり間隔は１日から３６５日までを設定してください');
        }
        $this->wateringInterval=$wateringInterval;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->wateringInterval;
    }

}
