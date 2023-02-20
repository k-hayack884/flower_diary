<?php

namespace App\Packages\Domains\Fertilizer;

use DomainException;

class FertilizerAmount
{
    public const RESET=0;

    /**
     * @var int
     */
    private int $amount;

    /**
     * @param int $amount
     */
    public function __construct(int $amount)
    {
        if ($amount < 0 || $amount > 10000) {
            throw new DomainException('１日当たりの肥料量はは０～９９９９グラムまでを設定してください');
        }
        $this->amount=$amount;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->amount;
    }
}
