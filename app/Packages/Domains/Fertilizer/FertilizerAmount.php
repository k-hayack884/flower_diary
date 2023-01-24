<?php

namespace App\Packages\Domains\Fertilizer;

class FertilizerAmount
{
    private int $amount;

    public function __construct(int $amount)
    {
        if ($amount < 1 || $amount > 10000) {
            throw new DomainException('１日当たりの水やり回数は１～９９９９グラムまでを設定してください');
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
