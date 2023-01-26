<?php

namespace App\Packages\Domains\Fertilizer;

use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingID;
use DomainException;

class TarmFertilizerSetting
{
    private FertilizerSettingID $fertilizerSettingID;
    private array $months = [];
    private FertilizerNote $fertilizerNote;
    private FertilizerAmount $fertilizerAmount;
    private FertilizerName $fertilizerName;

    public const RESET = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    public function __construct(
        FertilizerSettingID $fertilizerSettingID,
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
        $this->fertilizerSettingID = $fertilizerSettingID;
        $this->months = $months;
        $this->fertilizerNote = $fertilizerNote;
        $this->fertilizerAmount = $fertilizerAmount;
        $this->fertilizerName = $fertilizerName;
    }

    /**
     * @param array $months
     * @return TarmFertilizerSetting
     */
    public function tarmUpdate(array $months): TarmFertilizerSetting
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
            $this->fertilizerSettingID,
            $months,
            $this->fertilizerNote,
            $this->fertilizerAmount,
            $this->fertilizerName,
        );
    }

    /**
     * @return TarmFertilizerSetting
     */
    public function tarmReset(): TarmFertilizerSetting
    {
        return new self(
            $this->fertilizerSettingID,
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
     * @return FertilizerSettingID
     */
    public function getFertilizerSettingId(): FertilizerSettingID
    {
        return $this->fertilizerSettingID;
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
