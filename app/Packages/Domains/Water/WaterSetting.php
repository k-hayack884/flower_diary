<?php

namespace App\Packages\Domains\Water;

use DomainException;

class WaterSetting
{
    private WaterSettingID $waterSettingID;
    private Tarm $tarm;
    private WaterAmount $waterAmount;
    private WaterAmountNote $waterAmountNote;
    private int $wateringTimes;
    private int $wateringInterval;
    public function __construct(Tarm $tarm, WaterAmount $waterAmount, WaterAmountNote $waterAmountNote,int $wateringTimes,int $wateringInterval)
    {
        if($wateringTimes<1 || $wateringTimes>9){
            throw new DomainException('１日当たりの水やり回数は１～９回までを設定してください');
        }
        if($wateringInterval<1 || $wateringInterval>365){
            throw new DomainException('水やり間隔は１日から３６５日までを設定してください');
        }
        $this->waterSettingID = new WaterSettingID();
        $this->tarm = $tarm;
        $this->waterAmount = $waterAmount;
        $this->waterAmountNote = $waterAmountNote;
        $this->wateringTimes=$wateringTimes;
        $this->wateringInterval=$wateringInterval;
    }

    public function reset(): WaterSetting
    {
        $tarm=new Tarm(Tarm::RESET);
        $waterAmount=WaterAmount::settingModerateAmount();
        $waterAmountNote=new WaterAmountNote(WaterAmountNote::RESET);
        return new self($tarm,$waterAmount,$waterAmountNote,1,1);
    }

    public function getId(): WaterSettingID
    {
        return $this->waterSettingID;
    }

    /**
     * @return Tarm|array|int[]
     */
    public function getTarm(): array|Tarm
    {
        return $this->tarm->getMonths();
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->waterAmount->getValue();
    }

    /**
     * @return string
     */
    public function getAmountNote(): string
    {
        return $this->waterAmountNote->getNote();
    }

    /**
     * @return int
     */
    public function getWateringTimes(): int
    {
        return $this->wateringTimes;
    }

    /**
     * @return int
     */
    public function getWateringInterval(): int
    {
        return $this->wateringInterval;
    }

}
