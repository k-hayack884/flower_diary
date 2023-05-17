<?php

namespace App\Packages\Domains\Water;

use DomainException;

class WateringTimes
{
    public const RESET=1;
    /**
     * @var int
     */
    private int $wateringTimes;

    /**
     * @param int $wateringTimes
     */
    public function __construct(int $wateringTimes)
    {
        if ($wateringTimes < 1 || $wateringTimes > 9) {
            throw new DomainException('１日当たりの水やり回数は１～９回までを設定してください');
        }
        $this->wateringTimes=$wateringTimes;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->wateringTimes;
    }
}
