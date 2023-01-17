<?php

namespace App\Packages\Domains\Water;

use DomainException;

class WaterCheckSeat
{
    private WaterCheckSeatID $waterSettingID;
    private TarmWaterSetting $tarm;
    private WaterSetting $waterSetting;
    private WaterAmountNote $waterAmountNote;

    public function __construct(TarmWaterSetting $tarm, WaterSetting $waterSetting, WaterAmountNote $waterAmountNote)
    {
        $this->waterSettingID = new WaterCheckSeatID();
        $this->tarm = $tarm;
        $this->waterSetting = $waterSetting;
        $this->waterAmountNote = $waterAmountNote;
    }

    public function updateTarm(array $month): WaterCheckSeat
    {
        $updatedTarm = new TarmWaterSetting($month);
        return new self($updatedTarm, $this->waterSetting, $this->waterAmountNote);
    }

    public function updateNote(string $note): WaterCheckSeat
    {
        $updatedNote=$this->waterAmountNote->update($note);
        return new self($this->tarm, $this->waterSetting, $updatedNote);
    }
    public function updateSetting(string $value,int $wateringTimes,int $wateringInterval): WaterCheckSeat
    {
        $updatedSetting=$this->waterSetting->update($value, $wateringTimes, $wateringInterval);
        return new self($this->tarm, $updatedSetting, $this->waterAmountNote);
    }

    public function reset(): WaterCheckSeat
    {
        $tarm = new TarmWaterSetting(TarmWaterSetting::RESET);
        $waterAmount = WaterAmount::settingModerateAmount();
        $waterAmountNote = new WaterAmountNote(WaterAmountNote::RESET);
        return new self($tarm, $waterAmount, $waterAmountNote, 1, 1);
    }

    public function getId(): WaterCheckSeatID
    {
        return $this->waterSettingID;
    }

    /**
     * @return TarmWaterSetting|array|int[]
     */
    public function getTarm(): array|TarmWaterSetting
    {
        return $this->tarm->getMonths();
    }


    /**
     * @return string
     */
    public function getAmountNote(): string
    {
        return $this->waterAmountNote->getNote();
    }



    /**
     * @return WaterSetting
     */
    public function getWaterSetting(): WaterSetting
    {
        return $this->waterSetting;
    }

}
