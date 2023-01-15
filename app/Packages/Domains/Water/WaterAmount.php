<?php

declare(strict_types=1);

namespace App\Packages\Domains\Water;

use Carbon\Carbon;
use DomainException;

class WaterAmount
{
    public const A_lot ='a_lot';
    public const MODERATE_AMOUNT='moderate_amount';
    public const SPARINGLY ='sparingly';

    private array $amount=[
        self::A_lot=>'たっぷり',
        self::MODERATE_AMOUNT=>'適量',
        self::SPARINGLY=>'ひかえめ',
    ];
    private Carbon $create_at;
public function __construct(string $value)
{
    if(!array_key_exists($value,$this->amount)){
        $message='指定されてた水の設定が存在しません';
        throw new DomainException($message);
    }
    $this->value=$value;
    $this->create_at = Carbon::now();
}

    public static function settingALot(): WaterAmount
    {
        return new self(self::A_lot);
    }
    public function isALot(): bool
    {
    return $this->value===self::A_lot;
    }
    public function isModerateAmount(): bool
    {
        return $this->value===self::MODERATE_AMOUNT;
    }
    public function isSparingly(): bool
    {
        return $this->value===self::SPARINGLY;
    }

    public function getValue()
    {
        return $this->value;
    }
    public function getCreateAt(): Carbon
    {
        return $this->create_at->days();
    }
}
