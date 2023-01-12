<?php

namespace App\Packages\Domains\Water;

use Carbon\Carbon;
use DomainException;

class WaterRecord
{
    public const A_lot ='a_lot';
    public const MODERATE_AMOUNT='moderate_amount';
    public const SPARINGLY ='sparingly';

    private array $amonut=[
        self::A_lot=>'たっぷり',
        self::MODERATE_AMOUNT=>'適量',
        self::SPARINGLY=>'ひかえめ',
    ];
    private Carbon $create_at;
public function __construct(string $value)
{
    if(!array_key_exists($value,$this->amonut)){
        $parameters=[
            'value'=>$value,
        ];
        $message=sprintf('指定されてた水の設定が存在しません',$value);
        AppLog::error(__METHOD__,$message,$parameters);
        throw new DomainException($message);
    }
    $this->value=$value;
    $this->create_at = Carbon::now();
}

    public static function settingALot(): WaterRecord
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
    public function getCreateAt(): Carbon
    {
        return $this->create_at->days();
    }
}
