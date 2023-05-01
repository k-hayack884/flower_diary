<?php

namespace App\Packages\infrastructures\Care;

use App\Models\FertilizerAlertTime;
use App\Models\FertilizerSetting;
use App\Models\WaterAlertTime;
use App\Models\CheckSeat;
use App\Models\WaterSetting;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\Water\WaterSettingCollection;
use Carbon\Carbon;

class CareFertilizerRepository
{
    public function find(CheckSeatId $checkSeatId)
    {
        $currentMonth = (int)Carbon::now()->format('m');
        $fertilizerSettings = FertilizerSetting::where('check_seat_id', $checkSeatId->getId())
            ->get();

        $alertTimes = [];
        foreach ($fertilizerSettings as $fertilizerSetting) {
            if (in_array($currentMonth, json_decode($fertilizerSetting->months))) {
                $alertTimes[] = FertilizerAlertTime::where('alert_month', $currentMonth)
                    ->where('fertilizer_setting_id', $fertilizerSetting->fertilizer_setting_id)
                    ->with('fertilizerSetting:fertilizer_setting_id,months,fertilizer_note,fertilizer_amount,fertilizer_name')
                    ->get();
            }
        }
        return $alertTimes;
    }

    public function save(WaterSettingCollection $waterSetting)
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

    public function push($alertTimeId)
    {
        $alertTime  = WaterAlertTime::where('alert_time_id', $alertTimeId)
            ->first();
        $alertTime->resent_care_time=now();
        $alertTime->save();
    }
}
