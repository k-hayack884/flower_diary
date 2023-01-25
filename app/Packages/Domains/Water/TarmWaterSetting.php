<?php

namespace App\Packages\Domains\Water;

use DomainException;

class TarmWaterSetting
{
    private WaterSettingID $waterSettingID;
    private array $months = [];
    private WaterNote $waterNote;
    private WaterAmount $waterAmount;
    private WateringTimes $wateringTimes;
    private WateringInterval $wateringInterval;
    public const RESET = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    private array $alertTimes = [];

    public function __construct(
        WaterSettingID   $waterSettingID,
        array            $months,
        WaterNote        $waterNote,
        WaterAmount      $waterAmount,
        WateringTimes    $wateringTimes,
        WateringInterval $wateringInterval,
        array|null       $alertTimes = [])
    {
        if (count($months) > 12) {
            throw new DomainException('月の数が１３個以上あります');
        }

        foreach ($months as $month) {
            if (!preg_match("/^[0-9]$|^1[0-2]$/", $month)) {
                throw new DomainException('その文字は使用できません');
            }
        }
        $this->waterSettingID = $waterSettingID;
        $this->months = $months;
        $this->waterNote = $waterNote;
        $this->waterAmount = $waterAmount;
        $this->wateringTimes = $wateringTimes;
        $this->wateringInterval = $wateringInterval;
        if ($alertTimes === null) {
            $this->alertTimes = [];
        } else {
            $this->alertTimes = $alertTimes;
        }

    }


    public function tarmUpdate(array $months): TarmWaterSetting
    {
        if (count($months) > 13) {
            throw new DomainException('月の数が１３個以上あります');
        }
        foreach ($months as $month) {
            if (!preg_match("/^[0-9]$|^1[0-2]$/", $month)) {
                throw new DomainException('その文字は使用できません');
            }
        }
        return new self(
            $this->waterSettingID,
            $months,
            $this->waterNote,
            $this->waterAmount,
            $this->wateringTimes,
            $this->wateringInterval,
            $this->alertTimes);
    }

    public function tarmReset(): TarmWaterSetting
    {
        return new self(
            $this->waterSettingID,
            self::RESET,
            $this->waterNote,
            $this->waterAmount,
            $this->wateringTimes,
            $this->wateringInterval,
            $this->alertTimes);
    }

    /**
     * @param int $hour
     * @param int $minute
     * @return void
     */
    public function addAlertTime(int $hour, int $minute): void
    {
        if ($hour < 0 || $hour > 23) {
            throw new DomainException('時間は0～23時の範囲で設定してください');
        }
        if ($minute < 0 || $minute > 59) {
            throw new DomainException('分は0～59分の範囲で設定してください');
        }
        $dateTime = sprintf('%02d', $hour) . ':' . sprintf('%02d', $minute);
        $this->alertTimes[] = $dateTime;
    }

    public function resetAlertTime(): void
    {
        $this->alertTimes = [];
    }

    public function monthsIntoString(): string
    {
        return implode(",", $this->months);
    }

    public function alertTimesIntoString(): string
    {
        return implode(",", $this->alertTimes);
    }

    public function getWaterSettingId(): WaterSettingID
    {
        return $this->waterSettingID;
    }

    /**
     * @return array
     */
    public function getMonths(): array
    {
        return $this->months;
    }

    /**
     * @return WaterAmount
     */
    public function getWaterAmount(): WaterAmount
    {
        return $this->waterAmount;
    }

    /**
     * @return WaterNote
     */
    public function getWaterNote(): WaterNote
    {
        return $this->waterNote;
    }

    /**
     * @return WateringTimes
     */
    public function getWateringTimes(): WateringTimes
    {
        return $this->wateringTimes;
    }

    /**
     * @return WateringInterval
     */
    public function getWateringInterval(): WateringInterval
    {
        return $this->wateringInterval;
    }

    public function getAlertTimes(): array
    {
        return $this->alertTimes;
    }
}
