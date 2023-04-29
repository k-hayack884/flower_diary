<?php

namespace App\Packages\Domains\Water;

use DomainException;

class MonthsWaterSetting
{
    public const RESET = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    /**
     * @var WaterSettingId $waterSettingId
     * @var int[] $months
     * @var WaterNote $waterNote
     * @var WaterAmount $waterAmount
     * @var WateringTimes $wateringTimes
     * @var WateringInterval $wateringInterval
     */
    private WaterSettingId $waterSettingId;
    private array $months = [];
    private WaterNote $waterNote;
    private WaterAmount $waterAmount;
    private WateringTimes $wateringTimes;
    private WateringInterval $wateringInterval;
    private array $alertTimes = [];

    /**
     * @param WaterSettingId $waterSettingId
     * @param array $months
     * @param WaterNote $waterNote
     * @param WaterAmount $waterAmount
     * @param WateringTimes $wateringTimes
     * @param WateringInterval $wateringInterval
     * @param array|null $alertTimes
     */
    public function __construct(
        WaterSettingId   $waterSettingId,
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
        $this->waterSettingId = $waterSettingId;
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

    /**
     * @param array $months
     * @return MonthsWaterSetting
     */
    public function tarmUpdate(array $months): MonthsWaterSetting
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
            $this->waterSettingId,
            $months,
            $this->waterNote,
            $this->waterAmount,
            $this->wateringTimes,
            $this->wateringInterval,
            $this->alertTimes);
    }

    /**
     * @return MonthsWaterSetting
     */
    public function tarmReset(): MonthsWaterSetting
    {
        return new self(
            $this->waterSettingId,
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

    /**
     * @return void
     */
    public function resetAlertTime(): void
    {
        $this->alertTimes = [];
    }

    /**
     * @return string
     */
    public function monthsIntoString(): string
    {
        return implode(",", $this->months);
    }

    /**
     * @return string
     */
    public function alertTimesIntoString(): string
    {
        return implode(",", $this->alertTimes);
    }


    /**
     * @return WaterSettingId
     */
    public function getWaterSettingId(): WaterSettingId
    {
        return $this->waterSettingId;
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

    /**
     * @return array
     */
    public function getAlertTimes(): array
    {
        $formattedAlertTimes = [];
        foreach ($this->alertTimes as $alertTime) {
            $formattedTime = date('H:i', strtotime($alertTime));
            $formattedAlertTimes[] = $formattedTime;
        }
        return $formattedAlertTimes;
    }
}
