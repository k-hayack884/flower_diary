<?php

namespace App\Packages\infrastructures\Water;

use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use DomainException;

class WaterRepository
{

    public function find(): WaterSettingCollection
    {
        $waterSettings = WaterSettingDB::get();
        $waterSettingsCollection = new WaterSettingCollection();
        foreach ($waterSettings as $waterSettingDb) {
            $waterSetting = $this->makeTarmWaterSetting($waterSettingDb);
            $waterSettingsCollection->pyt($waterSetting);
        }
        return $waterSettingsCollection;
    }

    public function findById(WaterSettingID $waterSettingID)
    {
        $waterSettingDb = WaterSettingDB::find($waterSettingID->getId());
        if ($waterSettingDb === null) {
            throw new DomainException('指定された水やり設定のIDが存在しません');
        }
        return $this->makeTarmWaterSetting($waterSettingDb);
    }

    public function save(TarmWaterSetting $waterSetting): void
    {
        WaterSettingDB::updateOrCreate(
            ['water_setting_id' => $waterSetting->getId()->getId()],
            ['months' => $waterSetting->monthsIntoString()],
            ['note' => $waterSetting->getWaterNote()->getNote()],
            ['amount' => $waterSetting->getWaterAmount()->getValue()],
            ['watering_times' => $waterSetting->getWateringTimes()->getValue()],
            ['watering_interval' => $waterSetting->getWateringInterval()->getValue()],
            ['alert_times' => $waterSetting->alertTimesIntoString()]
        );
    }

    public function delete(TarmWaterSetting $waterSetting): void
    {
        WaterSettingDB::destroy($waterSetting->getId()->getId());
    }$waterSettingId
    private function makeTarmWaterSetting(WaterSettingDB $waterSettingDb): TarmWaterSetting
    {
        return new TarmWaterSetting(
            $this->makeWaterSettingId($waterSettingDb->water_setting_id),
$waterSettingDb->months,
$waterSettingDb->note,
$waterSettingDb->amount,
$waterSettingDb->watering_times,
$waterSettingDb->watering_interval,
$waterSettingDb->alert_times
        );
    }

    private function makeWaterSettingId(string $waterSettingId)
    {
        return new WaterSettingID($waterSettingId);
    }
}
