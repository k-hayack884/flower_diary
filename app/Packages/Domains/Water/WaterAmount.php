<?php

declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

class WaterAmount
{
    public const A_lot = 'a_lot';
    public const MODERATE_AMOUNT = 'moderate_amount';
    public const SPARINGLY = 'sparingly';

    /**
     * @var string
     */
    public string $value;
    /**
     * @var array|string[]
     */
    private array $amount = [
        self::A_lot => 'たっぷり',
        self::MODERATE_AMOUNT => '適量',
        self::SPARINGLY => 'ひかえめ',
    ];

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!array_key_exists($value, $this->amount)) {
            $message = '指定されてた水の設定が存在しません';
            throw new DomainException($message);
        }
        $this->value = $value;
    }

    /**
     * @return WaterAmount
     */
    public static function settingALot(): WaterAmount
    {
        return new self(self::A_lot);
    }

    /**
     * @return WaterAmount
     */
    public static function settingModerateAmount(): WaterAmount
    {
        return new self(self::MODERATE_AMOUNT);
    }

    /**
     * @return WaterAmount
     */
    public static function settingSparingly(): WaterAmount
    {
        return new self(self::SPARINGLY);
    }

    /**
     * @return bool
     */
    public function isALot(): bool
    {
        return $this->value === self::A_lot;
    }

    /**
     * @return bool
     */
    public function isModerateAmount(): bool
    {
        return $this->value === self::MODERATE_AMOUNT;
    }

    /**
     * @return bool
     */
    public function isSparingly(): bool
    {
        return $this->value === self::SPARINGLY;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
