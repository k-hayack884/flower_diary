<?php

namespace App\Packages\Domains\Water;

class WaterSetting
{
    private WaterAmount $waterAmount;
    private WateringTimes $wateringTimes;
    private WateringInterval $wateringInterval;

    public function __construct(WaterAmount $waterAmount,WateringTimes $wateringTimes,WateringInterval $wateringInterval)
    {
        $this->waterAmount=$waterAmount;
        $this->wateringTimes=$wateringTimes;
        $this->wateringInterval=$wateringInterval;
    }

    public function update(string $value,int $wateringTimes,int $wateringInterval): WaterSetting
    {
        $updatedWaterAmount=new WaterAmount($value);
        $updatedWateringTimes=new WateringTimes($wateringTimes);
        $updatedWateringInterval=new WateringInterval($wateringInterval);
        return new self($updatedWaterAmount,$updatedWateringTimes,$updatedWateringInterval);
    }
    public function reset(): WaterSetting
    {
        $waterAmount=WaterAmount::settingModerateAmount();
        $wateringTimes=new WateringTimes(WateringTimes::RESET);
        $wateringInterval=new wateringInterval(wateringInterval::RESET);
        return new self($waterAmount,$wateringTimes,$wateringInterval);
    }
    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->waterAmount->getValue();
    }

    /**
     * @return int
     */
    public function getWateringTimes(): int
    {
        return $this->wateringTimes->getValue();
    }

    /**
     * @return int
     */
    public function getWateringInterval():int
    {
        return $this->wateringInterval->getValue();
    }
}
