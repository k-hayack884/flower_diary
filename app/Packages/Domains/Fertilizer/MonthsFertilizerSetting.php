<?php

namespace App\Packages\Domains\Fertilizer;

use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingId;
use DomainException;

class MonthsFertilizerSetting
{
    private FertilizerSettingId $fertilizerSettingId;
    private array $months = [];
    private FertilizerNote $fertilizerNote;
    private FertilizerAmount $fertilizerAmount;
    private FertilizerName $fertilizerName;

    public const RESET = [];

    public function __construct(
        FertilizerSettingId $fertilizerSettingId,
        array               $months,
        FertilizerNote      $fertilizerNote,
        FertilizerAmount    $fertilizerAmount,
        FertilizerName      $fertilizerName)
    {
        if (count($months) > 12) {
            throw new DomainException('月の数が１３個以上あります');
        }

        foreach ($months as $month) {
            if (!preg_match("/^[0-9]$|^1[0-2]$/", $month)) {
                throw new DomainException('その文字は使用できません');
            }
        }
        $this->fertilizerSettingId = $fertilizerSettingId;
        $this->months = $months;
        $this->fertilizerNote = $fertilizerNote;
        $this->fertilizerAmount = $fertilizerAmount;
        $this->fertilizerName = $fertilizerName;
    }

    /**
     * @param array $months
     * @return MonthsFertilizerSetting
     */
    public function tarmUpdate(array $months): MonthsFertilizerSetting
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
            $this->fertilizerSettingId,
            $months,
            $this->fertilizerNote,
            $this->fertilizerAmount,
            $this->fertilizerName,
        );
    }

    /**
     * @return MonthsFertilizerSetting
     */
    public function tarmReset(): MonthsFertilizerSetting
    {
        return new self(
            $this->fertilizerSettingId,
            self::RESET,
            $this->fertilizerNote,
            $this->fertilizerAmount,
            $this->fertilizerName
        );
    }

    /**
     * @return string
     */
    public function monthsIntoString(): string
    {
        return implode(",", $this->months);
    }

    /**
     * @return FertilizerSettingId
     */
    public function getFertilizerSettingId(): FertilizerSettingId
    {
        return $this->fertilizerSettingId;
    }

    /**
     * @return array
     */
    public function getMonths(): array
    {
        return $this->months;
    }

    /**
     * @return FertilizerAmount
     */
    public function getFertilizerAmount(): FertilizerAmount
    {
        return $this->fertilizerAmount;
    }

    /**
     * @return FertilizerNote
     */
    public function getFertilizerNote(): FertilizerNote
    {
        return $this->fertilizerNote;
    }

    /**
     * @return FertilizerName
     */
    public function getFertilizerName(): FertilizerName
    {
        return $this->fertilizerName;
    }
}
