<?php

namespace App\Packages\infrastructures\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use DomainException;
class WaterRepository implements WaterSettingRepositoryInterface
{
//
//    public function find(): WaterSettingCollection
//    {
//        $waterSettings = WaterSettingDB::get();
//        $waterSettingsCollection = new WaterSettingCollection();
//        foreach ($waterSettings as $waterSettingDb) {
//            $waterSetting = $this->makeTarmWaterSetting($waterSettingDb);
//            $waterSettingsCollection->put($waterSetting);
//        }
//        return $waterSettingsCollection;
//    }
//
//    public function findById(WaterSettingId $waterSettingID): MonthsWaterSetting
//    {
//        $waterSettingDb = WaterSettingDB::find($waterSettingID->getId());
//        if ($waterSettingDb === null) {
//            throw new DomainException('指定された水やり設定のIDが存在しません');
//        }
//        return $this->makeTarmWaterSetting($waterSettingDb);
//    }
//
//    public function save(MonthsWaterSetting $waterSetting): void
//    {
//        WaterSettingDB::updateOrCreate(
//            ['water_setting_id' => $waterSetting->getId()->getId()],
//            ['months' => $waterSetting->monthsIntoString()],
//            ['note' => $waterSetting->getWaterNote()->getValue()],
//            ['amount' => $waterSetting->getWaterAmount()->getValue()],
//            ['watering_times' => $waterSetting->getWateringTimes()->getValue()],
//            ['watering_interval' => $waterSetting->getWateringInterval()->getValue()],
//            ['alert_times' => $waterSetting->alertTimesIntoString()]
//        );
//    }
//
//    public function delete(WaterSettingId $waterSettingId): void
//    {
//        WaterSettingDB::destroy($waterSettingId->getId());
//    }
//    private function makeTarmWaterSetting(WaterSettingDB $waterSettingDb): MonthsWaterSetting
//    {
//        $arrayMonths = explode(",", $waterSettingDb->months);
//        $arrayAlertTimes = explode(",", $waterSettingDb->alert_times);
//        return new MonthsWaterSetting(
//            $this->makeWaterSettingId($waterSettingDb->water_setting_id),
//            $arrayMonths,
//            $waterSettingDb->note,
//            $waterSettingDb->amount,
//            $waterSettingDb->watering_times,
//            $waterSettingDb->watering_interval,
//            $arrayAlertTimes
//        );
//    }
//
//    private function makeWaterSettingId(string $waterSettingId): WaterSettingId
//    {
//        return new WaterSettingId($waterSettingId);
//    }
}
