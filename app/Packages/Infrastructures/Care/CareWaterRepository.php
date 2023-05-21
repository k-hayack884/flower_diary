<?php

namespace App\Packages\infrastructures\Care;

use App\Models\PlantUnit;
use App\Models\User;
use App\Models\WaterAlertTime;
use App\Models\CheckSeat;
use App\Models\WaterSetting;
use App\Packages\Domains\Care\WaterAlertTimeId;
use App\Packages\Domains\Care\WaterCare;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\User\UserId;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use Carbon\Carbon;
use DateTime;

class CareWaterRepository
{
    /**
     * @param UserId $userId
     * @return array
     */
    public function findCareByUser(UserId $userId): array
    {
        $currentMonth = (int)Carbon::now()->format('m');
        $now = Carbon::now();

        $plantUnits = PlantUnit::with('checkSeat.waterSetting.waterAlertTimes')
            ->where('user_id', $userId->getId())
            ->get();

        $careWaterSettings = [];
        foreach ($plantUnits as $plantUnit) {
            $checkSeat = $plantUnit->checkSeat;
            $waterSettings = $checkSeat->waterSetting;
            if (!$waterSettings) {
                continue;
            }
            foreach ($waterSettings as $waterSetting) {
                if (in_array($currentMonth, json_decode($waterSetting->months))) {
                    $waterSetting->plant_name = $plantUnit->plant_name;
                    $careWaterSettings[] = $waterSetting;
                }
            }
        }
        $waterCares = [];
        foreach ($careWaterSettings as $careWaterSetting) {
            foreach ($careWaterSetting->waterAlertTimes as $alertTime) {
                if ($alertTime->resent_care_time == null) {
                    $diff = $now->diffInSeconds(Carbon::createFromTimeString('0001-01-01 00:00:00')) * 1000;
                } else {
                    $diff = $now->diffInMilliseconds(Carbon::createFromTimeString($alertTime->resent_care_time));
                }
                $interval = 86400000 * $careWaterSetting->watering_interval;
                if ($diff >= $interval) {
                    $waterCares[] = new WaterCare(
                        new WaterAlertTimeId($alertTime->alert_time_id),
                        new plantName($careWaterSetting->plant_name),
                        new WaterAmount($careWaterSetting->water_amount),
                        new WaterNote($careWaterSetting->water_note),
                        $alertTime->alert_time,
                    );
                }

            }
        }

        return $waterCares;
    }

    /**
     * @param WaterSettingCollection $waterSetting
     * @return void
     */
    public function save(WaterSettingCollection $waterSetting):void
    {
        $collectionArray = $waterSetting->toArray();
        foreach ($collectionArray as $waterSetting) {
            foreach ($waterSetting->getAlertTimes() as $time) {

                $existingRecord = WaterAlertTime::where([
                    'water_setting_id' => $waterSetting->getWaterSettingId()->getId(),
                    'alert_time' => $time,
                ])->first();
                if (!$existingRecord) {
                    WaterAlertTime::create(["alert_time_id" => new Uuid(),
                        "water_setting_id" => $waterSetting->getWaterSettingId()->getId(),
                        "alert_time" => $time]);
                }
            }

        }
    }

    /**
     * @param $alertTimeId
     * @return void
     */
    public function push($alertTimeId):void
    {
        $alertTime = WaterAlertTime::where('alert_time_id', $alertTimeId)
            ->first();
        $alertTime->resent_care_time = now();
        $alertTime->save();
    }
}
